<?php
/**
 * UserController - Controller de usuários
 * @author Cândido Farias
 * @package mvc
 * @since 0.1
 */
class UserController extends MainController
{

	/**
	 * Carrega a página "/views/user/index.php"
	 * @author Cândido Farias
	 */
    public function index() {
		// Título da página
		echo $this->title = 'User';
	} // index
	
	

    /**
	 * Carrega a página "/views/user/login.php"
	 * @author Cândido Farias
	 */
    public function login() {
		// Título da página
		$this->title = 'Login';
		/** Carrega os arquivos do view **/
		require PATH . '/views/user/login.php';
	} // login


    /**
	 * Encerra a sessão do usuário
	 * @author Cândido Farias
	 */
    public function logout() {
		$this->unsetUser();
		$this->mensagem->setMsg("success", "Bye-bye!");
		header("Refresh: 2; url =".HOME_URI);
    } // logout

    /**
	 * Autentica o usuario"
	 * @author Cândido Farias
	 */
    public function autenticar() {
		if(isset($_POST['user'])){
			$userModel=$this->load_model("user");
			$user=$userModel->autenticar($_POST['user']['email'],md5($_POST['user']['password']));
			if($user){
				$this->setUser($user);
				$this->mensagem->setMsg("success", "Login realizado com sucesso!");
			}else{
				$this->mensagem->setMsg("danger", "Falha ao realizar o login!");
			}
			
		}
		
		header("Refresh: 5; url =".HOME_URI);
	
    } // autenticar
	
} // class UserController