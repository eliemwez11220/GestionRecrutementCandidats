<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class User extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->model('Educazad_model');
    } 

    /*
     * Listing of tb_am_users
     */
    function index()
    {
        $params['limit'] = RECORDS_PER_PAGE; 
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        
        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('tb_rm_user/index?');
        $config['total_rows'] = $this->User_model->get_all_tb_am_users_count();
        $this->pagination->initialize($config);

        $data['tb_am_users'] = $this->User_model->get_all_tb_am_users($params);
        
        $data['_view'] = 'user/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new tb_am_user
     */
    function add()
    {   
        $this->load->library('form_validation');

		$this->form_validation->set_rules('asset_password','Asset Password','required');
		$this->form_validation->set_rules('asset_fullname','Asset Fullname','required');
		$this->form_validation->set_rules('asset_email','Asset Email','valid_email|required');
		$this->form_validation->set_rules('asset_type','Asset Type','required');
		$this->form_validation->set_rules('asset_fonction','Asset Fonction','required');
		
        $this->form_validation->set_rules('password_confirm','password_confirm','matches[asset_password]');
        //


		if($this->form_validation->run())     
        {   
           
           $options = array('cost' => 12);
            $asset_password = password_hash($this->input->post('asset_password'), PASSWORD_BCRYPT, $options);

            $current_datetime=date('Y-m-d H:i:s');
                $params = array(
                'asset_password' =>  $asset_password,
				'asset_fullname' => $this->input->post('asset_fullname'),
				'asset_username' => $this->input->post('asset_username'),
				'asset_email' => $this->input->post('asset_email'),
				'asset_sexe' => $this->input->post('asset_sexe'),
				'asset_phone' => $this->input->post('asset_phone'),
				'asset_type' => $this->input->post('asset_type'),
				'date_ajout' =>  $current_datetime,
				'date_connected' =>  $current_datetime,
				'account_activated' => "active",
				'asset_fonction' => $this->input->post('asset_fonction'),
				'asset_matricule' => $this->input->post('asset_matricule'),
            );
            
            $tb_am_user_id = $this->User_model->add_tb_am_user($params);
            redirect('user/index');
        }
        else
        {            
            $data['_view'] = 'user/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a tb_am_user
     */
    function edit($id_asset)
    {   
        // check if the tb_am_user exists before trying to edit it
        $data['tb_am_user'] = $this->User_model->get_tb_am_user($id_asset);
        
        if(isset($data['tb_am_user']['id_asset']))
        {
            $this->load->library('form_validation');
			$this->form_validation->set_rules('asset_password','Asset Password','required');
			$this->form_validation->set_rules('asset_fullname','Asset Fullname','required');
			$this->form_validation->set_rules('asset_email','Asset Email','valid_email|required');
			$this->form_validation->set_rules('asset_type','Asset Type','required');
			$this->form_validation->set_rules('asset_fonction','Asset Fonction','required');
		
			if($this->form_validation->run())     
            {   
                $options = array('cost' => 12);
            $asset_password = password_hash($this->input->post('asset_password'), PASSWORD_BCRYPT, $options);

            $current_datetime=date('Y-m-d H:i:s');
                $params = array(
					'asset_password' =>  $asset_password,
					'asset_fullname' => $this->input->post('asset_fullname'),
					'asset_username' => $this->input->post('asset_username'),
					'asset_email' => $this->input->post('asset_email'),
					'asset_sexe' => $this->input->post('asset_sexe'),
					'asset_phone' => $this->input->post('asset_phone'),
					'asset_type' => $this->input->post('asset_type'),
					'date_update' => $current_datetime,
					'date_connected' => $current_datetime,
					'asset_fonction' => $this->input->post('asset_fonction'),
					'asset_matricule' => $this->input->post('asset_matricule'),
                );

                $this->User_model->update_tb_am_user($id_asset,$params);            
                redirect('user/index');
            }
            else
            {
                $data['_view'] = 'user/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The tb_am_user you are trying to edit does not exist.');
    } 

    /*
     * Deleting tb_am_user
     */
    function remove($id_asset)
    {
        $tb_am_user = $this->User_model->get_tb_am_user($id_asset);

        // check if the tb_am_user exists before trying to delete it
        if(isset($tb_am_user['id_asset']))
        {
            $this->User_model->delete_tb_am_user($id_asset);
            redirect('user/index');
        }
        else
            show_error('The tb_am_user you are trying to delete does not exist.');
    }
    

    #====================================edition du profil utilisateur===============================charger vue profil
    public function account()
    {
        $data['title'] = "Profil utilisateur";
        $this->load->view('user_account', $data);
    }

    public function changePassword()
    {
        # recuperation of username
        $this->form_validation->set_rules('email', 'email', 'required|valid_email', array(
            'required' => 'email is required',
            'valid_email' => 'email is invalid',
        ));

        # recuperation of password
        $this->form_validation->set_rules('old_password', 'old_password', 'required', array(
            'required' => 'Le mot de passe ancien est obligatoire',
        ));

        # recuperation of password
        $this->form_validation->set_rules('new_password', 'new_password', 'required|min_length[6]', array(
            'required' => 'New Password is required',
            'min_length' => 'Le mot de passe doit avoir au moins 6 caracteres combines.',
        ));
        # recuperation of password
        $this->form_validation->set_rules('password_confirm', 'password_confirm', 'required|matches[new_password]', array(
            'required' => 'Confirm Password is required',
            'matches' => 'Le mot de passe de confirmation doit correspondre au nouveau mot de passe',
        ));

        # verifie if datas are corrects and redirect
        if ($this->form_validation->run()) {

            $asset_email = $this->input->post('email');
            $nvo_mot_pass = $this->input->post('new_password');
            $old_password = $this->input->post('old_password');

            $ancien_password_db = $this->Educazad_model->get_unique('tb_am_users', array('id_asset' => $this->session->id))->asset_password;

            if (password_verify($old_password, $ancien_password_db)) {

                //if (!preg_match("/^[a-z0-9_-]{6,75}$/i", $nvo_mot_pass)) {

                    $options = array('cost' => 12);
                    $asset_password = password_hash($nvo_mot_pass, PASSWORD_BCRYPT, $options);

                    $data_ut = compact('asset_password');
                    //mise à jour du mot de passe
                    if ($this->Educazad_model->update_data('tb_rm_users', $data_ut, array('id_asset' => $this->session->id))) {
                        //redirect
                        redirect(base_url() . 'user/account');
                    } else {
                        $this->setUploadError("Impossible de mettre à jour votre mot de passe !");
                    }

               // } else {
                   // $this->setUploadError("Vous avez saisi un mot de passe tres faible et il est inacceptable. 
            //Pour votre securite, le nouveau mot de passe doit avoir au moins 1 lettre Majuscule,
                // 1 lettre miniscule, un caractere special choisi parmi (*|#|@|$|?) et 1 chiffre de 0-9");
                //}
            } else {
                $this->setUploadError("Vous avez indiquer un faux ancien mot de passe. Verifier-le puis reessayer");
            }
        } else {
            $this->setUploadError("Coordonnees non valides");
        }
    }


    function updateAccount()
    {

        $this->form_validation->set_rules('fullname', 'fullname', 'required|min_length[6]|max_length[75]',
            array(
                'required' => 'Le nom complet est obligatoire',
                'min_length' => 'Le champ %s doit contenir au moins 8 caractères',
                'max_length' => 'Le champ %s doit contenir au plus 75 caractères'
            ));

        $this->form_validation->set_rules('username', 'username', 'required|min_length[3]|max_length[25]',
            array(
                'required' => 'Le nom utilisateur ou login est obligatoire',
                'min_length' => 'Le champ %s doit contenir au moins 3 caractères',
                'max_length' => 'Le champ %s doit contenir au plus 25 caractères'
            ));

        $this->form_validation->set_rules('email', 'email', 'required|valid_email|min_length[6]|max_length[25]',
            array(
                'required' => 'Adresse mail obligatoire',
                'valid_email' => 'Adresse mail invalide',
                'min_length' => 'Le champ %s doit contenir au moins 6 caractères',
                'max_length' => 'Le champ %s doit contenir au plus 25 caractères'
            ));

        $this->form_validation->set_rules('phone', 'phone', 'required|min_length[9]|max_length[15]',
            array(
                'required' => 'Numero telephone obligatoire',
                'min_length' => 'Le champ %s doit contenir au moins 9 caractères',
                'max_length' => 'Le champ %s doit contenir au plus 15 caractères'
            ));
        $this->form_validation->set_rules('matricule', 'matricule', 'required|min_length[5]|max_length[10]',
            array(
                'required' => 'Numero matricule obligatoire',
                'min_length' => 'Le champ %s doit contenir au moins 5 caractères',
                'max_length' => 'Le champ %s doit contenir au plus 10 caractères'
            ));

        $this->form_validation->set_rules('sexe', 'sexe', 'required|min_length[5]|max_length[10]',
            array(
                'required' => 'Sexe obligatoire',
                'min_length' => 'Le champ %s doit contenir au moins 5 caractères',
                'max_length' => 'Le champ %s doit contenir au plus 10 caractères'
            ));


        if ($this->form_validation->run()) {

            $current_datetime=date('Y-m-d H::s');
            $userdata = array(
                'asset_fullname' => $this->input->post('fullname'),
                'asset_username' =>trim($this->input->post('username')),
                'asset_phone' => "+243".$this->input->post('phone'),
                'asset_matricule' => $this->input->post('matricule'),
                'asset_email' => trim($this->input->post('email')),
                'asset_sexe' => $this->input->post('sexe'),
                'date_update' => $current_datetime,
            );

            if ($this->Educazad_model->update_data('tb_rm_users', $userdata,
                array('id_asset' => $this->session->id))) {

                $this->session->set_userdata('fullname', $this->input->post('fullname'));
                $this->session->set_userdata('username', $this->input->post('username'));

                $this->session->set_userdata('phone', $this->input->post('phone'));
                $this->session->set_userdata('matricule', $this->input->post('matricule'));
                $this->session->set_userdata('email', $this->input->post('email'));
                $this->session->set_userdata('sexe', $this->input->post('sexe'));

            
                redirect('user/account');

            } else {
                $this->setUploadError("Impossible de mettre à jour les données.");
            }
        } else {
            
            $this->setUploadError("Impossible de mettre à jour les données.");
        }
    }

    public function uploadPicture()
    {
        $config['upload_path'] = './global/img/avatars/';
        $config['allowed_types'] = 'gif|jpg|png|webp|jpeg|';
        // $config['max_size']             = 1024;
        // $config['max_width']            = 1024;
        //$config['max_height']           = 768;

        $this->load->library('upload', $config);

        $data['title'] = "Profil | Upload Picture";

        if (!$this->upload->do_upload('userfile')) {

            $error = array('error' => $this->upload->display_errors());

           $this->setUploadError('Les erreurs suivantes ont ete detectee : '. $error);
        } else {

            $data['upload_data'] = $this->upload->data();
            $data['file_name'] = $this->upload->data('file_name');
            $data['file_ext'] = $this->upload->data('file_ext');
            $data['full_path'] = $this->upload->data('full_path');

            $current_datetime = date('Y-m-d H:i:s');

            $picture_name = $data['file_name'];                          #name for new image for all patient
            $link_picture = 'global/img/avatars/' . $picture_name; #link for new profil

            $user_data = array(
                'asset_avatar' => $link_picture,
                'date_update' => $current_datetime
            );

            if ($this->Educazad_model->update_data('tb_rm_users', $user_data, array('id_asset' => $this->session->id))) {

                $this->session->set_userdata('avatar', $link_picture);                    #//update connected in session data
                $this->session->set_userdata('updated', $current_datetime);                    #//update loglogin in session data

                redirect('user/uploadSuccess');

            } else {
                $this->setUploadError("Une erreur de chargement de la photo a ete trouvee");
            }
        }
    }
    public function setUploadError($error)
    {
        $data['title'] = "Profil | Image upload Erreur";
        $data['error'] = $error;
        $this->load->view('user_account', $data);
    }

    public function uploadSuccess()
    {
        $data['title'] = "Profil | Image Update";
        $data['success'] = "Photo de profil modifiee avec success";
        $this->load->view('user_account', $data);
    }
}
