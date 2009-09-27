<?php



class ActionXmlRpc extends Action {


    public function Init() {  
        $this->SetDefaultEvent('ParseQuery');
    }

    protected function RegisterEvent(){
        $this->AddEvent('parsequery', 'ParseQuery');
    }

    protected function ParseQuery() {
        $this->XmlRpc_Test();
    }
}