<?php

require_once(DIR_SERVER_ROOT.'/classes/lib/external/class-IXR/class.IXR.php');


class XmlRpcServer extends IXR_Server {


    public function __construct($oEntity) {
          $this->methods = array(
              //WordPress API
              'wp.getUsersBlogs' => 'this:wp_GetUsersBlogs',
              'wp.getCategories' => 'this:wp_getCategories',

              //MetaWeblog API
              'metaWeblog.newPost' => 'this:mw_NewPost',
              'metaWeblog.getPost' => 'this:mw_GetPost',
              'metaWeblog.getRecentPosts' => 'this:mw_getRecentPosts',

              //Demo functions
              'demo.sayHello' => 'this:sayHello',
              'demo.addNumbers' => 'this:addNumbers'
          );

          $this->oEntity = $oEntity;
          $this->IXR_Server($this->methods);
    }

    public function sayHello() {
           error_log('test');
           return 'Hello!';
    }


    public function addNumbers($args) {
          $a = array_shift($args);
          $b = array_shift($args);

          return $a + $b;
    }

    public function LoginPassOk($login, $password) {
        return (
                  ((
                    (  // Пользователь может быть задан как логином, так и email-ом, поэтому нужно проверить и то и другое
                      (func_check($login,'mail') and $oUser=$this->oEntity->User_GetUserByMail($login))  
                      ||  $oUser=$this->oEntity->User_GetUserByLogin($login)
                    ) && ( 
                      $oUser->getPassword()==func_encrypt($password) and $oUser->getActivate()
                    ) && (
                      // Так как при получении сущности "User" с помощью getUserByLogin не определяется свойство isAdministrator
                      // дополнительно используем метод GetUserById
                      $oUser = $this->oEntity->User_GetUserById($oUser->getId())
                    ) 
                  ) or !($this->error = new IXR_Error(403, 'Bad login/pass combination.'))) ? $oUser : null);
        
    }

    
    
    public function wp_GetUsersBlogs($args) {

        $login = array_shift($args);
        $password =  array_shift($args);

        if (!($oUser = $this->LoginPassOk($login, $password))) { 
            return $this->error;
        }

        $blogs = array();
        ($oUser->isAdministrator() && $blogs = $this->oEntity->Blog_GetBlogs()) 
        or 
        ($blogs = array_merge(
                    $this->oEntity->Blog_GetRelationBlogUsersByUserId($oUser->getId()), 
                    $this->oEntity->Blog_GetBlogsByOwnerId($oUser->getId())
                  )
        );

        $struct = array();
        foreach($blogs as $blog) {
           $blog = (is_a($blog, 'BlogEntity_BlogUser') ? $this->oEntity->Blog_GetBlogById($blog->getBlogId()): $blog);
           $struct[] = array(
	                  'isAdmin'  => $oUser->isAdministrator(),
                          'url'      => DIR_WEB_ROOT . '/blog/' . $blog->getUrl() . '/',
                          'blogid'   => $blog->getId(),
		          'blogName' => $blog->getTitle(),
		          'xmlrpc'   => ''
		      );
         }

         return $struct;
    }

public function wp_getCategories($args) {
        $blogId =  array_shift($args);
        $login = array_shift($args);
        $password =  array_shift($args);

        if (!($oUser = $this->LoginPassOk($login, $password))) { 
            return $this->error;
        }

        $blogs = array();
        ($oUser->isAdministrator() && $blogs = $this->oEntity->Blog_GetBlogs()) 
        or 
        ($blogs = array_merge(
                    $this->oEntity->Blog_GetRelationBlogUsersByUserId($oUser->getId()), 
                    $this->oEntity->Blog_GetBlogsByOwnerId($oUser->getId())
                  )
        );

        $struct = array();
        foreach($blogs as $blog) {
           $blog = (is_a($blog, 'BlogEntity_BlogUser') ? $this->oEntity->Blog_GetBlogById($blog->getBlogId()): $blog);
           $struct[] = array(
	                  'isAdmin'  => $oUser->isAdministrator(),
                          'url'      => DIR_WEB_ROOT . '/blog/' . $blog->getUrl() . '/',
                          'categoryId'   => $blog->getId(),
		          'categoryName' => $blog->getTitle(),
		          'xmlrpc'   => ''
		      );
         }

         return $struct;
    } 

    public function mw_NewPost($args) {
          $blogId = (int) array_shift($args); 
          $login = array_shift($args);
          $password = array_shift($args);
          $struct = array_shift($args);
          $publish = array_shift($args);

          if (!($oUser = $this->LoginPassOk($login, $password))) {
              return $this->error; 
          }


          // Система не даст добавить один и тот же пост в два блога, поэтому публикуем только в первый блог
          if (  isset($struct['categories']) 
             && ($category = array_pop($struct['categories'])) 
             && ($oBlog = $this->oEntity->Blog_GetBlogByTitle($category))) {
              unset($struct['categories']);
              return $this->mw_NewPost(array($oBlog->getId(), $login, $password, $struct, $publish));
          }
                    
          $oBlog = (0 == $blogId ? 
                        $this->oEntity->Blog_GetPersonalBlogByUserId($oUser->getId()) :
			$this->oEntity->Blog_GetBlogById($blogId));

          

	   if (!$oBlog) {
			return new IXR_Error(401, 'Invalid blog name');
	   }		

           
  	   if (!$this->oEntity->Blog_GetRelationBlogUserByBlogIdAndUserId($oBlog->getId(),$oUser->getId())  and !$oUser->isAdministrator()) {
			if ($oBlog->getOwnerId()!=$oUser->getId()) {
				return new IXR_Error(401, 'You are not member of this blog');
			}
	   }

          		
  	   if (!$this->oEntity->ACL_CanAddTopic($oUser,$oBlog) and !$oUser->isAdministrator()) {
			return new IXR_Error(401, 'You are not allowed to post as this user');
	   }

           // Так как пользователь имеет право на публикацию, проверяем полученные данные
           $postContent = '';
           $postTitle = '';
           $postTags = '';

           foreach ($struct as $fieldKey => $fieldValue) {

                  switch($fieldKey) {
    
                        case 'description':
                             $postContent = $fieldValue;
                        break;

                        case 'title':
                             $postTitle = $fieldValue;
                        break;

                        // В MetaWeblog api нет поля tags, но для совместимости с LiveStreet он нужен
                        case 'mt_keywords':
                        case 'tags':
                             $postTags = $fieldValue;
                        break;
                  }
           }


          
	   if ($oTopicEquivalent=$this->oEntity->Topic_GetTopicUnique($oUser->getId(),md5($postContent))) {			
			return new IXR_Error(401, 'Topic content is not unique');			
	   }


          $oTopic=new TopicEntity_Topic();
          $oTopic->setBlogId($oBlog->getId());
          $oTopic->setUserId($oUser->getId());
	  $oTopic->setType('topic');
	  $oTopic->setTitle($postTitle);
          $oTopic->setCutText(null);	
          $oTopic->setTextHash(md5($postContent));
	  
          $sText=$this->oEntity->Text_Parser($postContent);
	  $sTextShort=$sText;
	  $sTextNew=$sText;
	  $sTextTemp=str_replace("\r\n",'[<rn>]',$postContent);
	  $sTextTemp=str_replace("\n",'[<n>]',$sTextTemp);
	  if (preg_match("/^(.*)<cut(.*)>(.*)$/Ui",$sTextTemp,$aMatch)) {			
                $aMatch[1]=str_replace('[<rn>]',"\r\n",$aMatch[1]);
		$aMatch[1]=str_replace('[<n>]',"\r\n",$aMatch[1]);
		$aMatch[3]=str_replace('[<rn>]',"\r\n",$aMatch[3]);
		$aMatch[3]=str_replace('[<n>]',"\r\n",$aMatch[3]);				
		$sTextShort=$this->oEntity->Text_Parser($aMatch[1]);
		$sTextNew=$this->oEntity->Text_Parser($aMatch[1].' '.$aMatch[3]);							
		if (preg_match('/^\s*name\s*=\s*"(.+)"\s*\/?$/Ui',$aMatch[2],$aMatchCut)) {				
			$oTopic->setCutText(trim($aMatchCut[1]));
		}				
	  }		
		
	  $oTopic->setText($sTextNew);
	  $oTopic->setTextShort($sTextShort);
	  $oTopic->setTextSource($postContent);		
	  $oTopic->setTags($postTags);
	  $oTopic->setDateAdd(date("Y-m-d H:i:s"));
	  $oTopic->setUserIp(func_getIp());

          $oTopic->setPublish(1);
  	  $oTopic->setPublishDraft(1);
          //TODO: принудительный вывод топика на главную страницу
          $oTopic->setPublishIndex(0);
          //TODO: проверять запрещены ли комментарии
          $oTopic->setForbidComment(0);


          $oTopic = $this->oEntity->Topic_AddTopic($oTopic);
         
          return ($oTopic->getId() > 0 ? $oTopic->getId() : new IXR_Error(500, 'Sorry, your entry could not be posted. Something wrong happened.'));
          
                    
    }

    public function mw_GetPost($args) {
          $postId  = (int) array_shift($args);
          $login = array_shift($args);
          $password = array_shift($args);

          if (!($oUser = $this->LoginPassOk($login, $password))) {
                return $this->error;
          }

          if (!($oTopic = $this->oEntity->Topic_GetTopicById($postId,null,-1))) {
               return new IXR_Error(401, 'Sorry, this topic does not exists');
          }

          $oBlogUser=$this->oEntity->Blog_GetRelationBlogUserByBlogIdAndUserId($oTopic->getBlogId(),$oUser->getId());		
          $bIsAdministratorBlog=$oBlogUser ? $oBlogUser->getIsAdministrator() : false;
          $bIsModeratorBlog=$oBlogUser ? $oBlogUser->getIsModerator() : false;
		
          if ($oTopic->getUserId()!= $oUser->getId() and !$oUser->isAdministrator() and !$bIsAdministratorBlog and !$bIsModeratorBlog and $oTopic->getBlogOwnerId()!=$oUser->getId()) {
			return new IXR_Error(401, 'Sorry, you can not edit this post.');
	   }


           $resp = array(
                    'dateCreated' => new IXR_Date($oTopic->getDateAdd()),
                    'userid' => $oTopic->getUserId(),
                    'postid' => $oTopic->getId(),
                    'description' => $oTopic->getTextSource(),
                    'title' => $oTopic->getTitle(),
                    'link' => $oTopic->getUrl(),
                    'permaLink' => $oTopic->getUrl(),
                     // commented out because no other tool seems to use this
                     // 'content' => $entry['post_content'],
                     'categories' => '',
                     'mt_excerpt' => $oTopic->getCutText(),
                     'mt_text_more' => $oTopic->getText(),
                     'mt_allow_comments' => $oTopic->getForbidComment(),
                     'mt_allow_pings' => false,
                     'mt_keywords' => $oTopic->getTags(),
                     'wp_slug' => $oTopic->getTitle(),
                     'wp_password' => false,
                     'wp_author_id' => $oTopic->getUserId(),
                     'wp_author_display_name'	=> '',
                     'date_created_gmt' => new IXR_Date($oTopic->getDateAdd()),
                     'post_status' => '',
                     'custom_fields' => $oTopic->getExtra()
           );

        return $resp;
    }


    public function mw_GetRecentPosts($args) {
    }

}