<?php

class AlunoController extends MainController{
    public function __construct(){
        $this->login_required=true;
        parent::__construct();
    }
    
    public function index(){
        if($this->login_required)
            /* verificar se temum uusario logado */

        /**Criar objeto do modelo */
        $modelo=$this->load_model("aluno");
        $alunos=$modelo->select();
       
        /** Carrega os arquivos do view **/
		require PATH . '/views/includes/header.php';
       			
        require PATH . '/views/includes/menu.php';
		
	    require PATH . '/views/aluno/index.php';
		
		require PATH . '/views/includes/footer.php';
    }

    public function add(){
        $aluno['id']='';
        $aluno['nome']='';
        $aluno['matricula']='';
        $aluno['data_nascimento']='';

        /** Carrega os arquivos do view **/
		require PATH . '/views/includes/header.php';
       			
        require PATH . '/views/includes/menu.php';
		
	    require PATH . '/views/aluno/form_aluno.php';
		
		require PATH . '/views/includes/footer.php';
    }

    public function salvar(){
        if(isset($_POST['aluno']['enviar'])){
            /**Remove o campo do POST */
            unset($_POST['aluno']['enviar']);
            /**Criar objeto do modelo */
            $modelo=$this->load_model("aluno");
        
            if(!empty($_POST['aluno']['id'])){
                $acao="update";
            }else{
                $acao="insert";
                unset($_POST['aluno']['id']);
            }
            
            if($alunos=$modelo->{$acao}($_POST['aluno'])){
                $this->mensagem->setMsg("success", "Aluno salvo com sucesso!");
            }else{
                $this->mensagem->setMsg("danger", "Falha ao salvar o aluno!");
            }           
        }
        header("location:".HOME_URI."aluno/");
    }

    public function editar($id){
        $modelo=$this->load_model("aluno");  
        $resultado=$modelo->select($id);
        
        $aluno=$resultado[0];
        require PATH . '/views/includes/header.php';
       			
        require PATH . '/views/includes/menu.php';
		
	    require PATH . '/views/aluno/form_aluno.php';
		
        require PATH . '/views/includes/footer.php';
        
    }

    public function excluir($id){
        $modelo=$this->load_model("aluno");  

        if($modelo->delete($id)){
            $this->mensagem->setMsg("success", "Aluno excluído com sucesso!");
        }else{
            $this->mensagem->setMsg("danger", "Falha ao excluir o aluno!");
        }

        header("location:".HOME_URI."aluno/");
    }
}