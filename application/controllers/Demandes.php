<?php
/*
 * Generated by CRUDigniter v3.2
 * www.crudigniter.com
 */

class Demandes extends CI_Controller
{
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
        $data['all_demandes'] = $this->Educazad_model->get_multiple('tb_rm_demandes', array(), 'tb_rm_demandes.date_postule', 'DESC');

        $data['_view'] = 'demandes/index';
        $this->load->view('layouts/main', $data);
    }

    /*
     * Adding a new tb_am_user
     */
    function add()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('offre_sid', 'Offre SID', 'required');
        $this->form_validation->set_rules('candidat_sid', 'Candidat SID', 'required');
        $this->form_validation->set_rules('nom_dossier', 'nom_dossier', 'required');

        if ($this->form_validation->run()) {
            $current_datetime = date('Y-m-d H:i:s');

            //get code department and status
            $code_candidat = strstr($this->input->post('candidat_sid'), '-', true);
            $candidat_sid = (!empty($code_candidat)) ? $code_candidat : $this->input->post('candidat_sid');  //get code department and status
            $code_offre = strstr($this->input->post('offre_sid'), '-', true);
            $offre_sid = (!empty($code_offre)) ? $code_offre : $this->input->post('offre_sid');

            $params = array(
                'candidat_sid' => $candidat_sid,
                'offre_sid' => $offre_sid,
                'date_postule' => $this->input->post('date_postule'),
                'nom_dossier' => $this->input->post('nom_dossier'),
                'statut_demande' => $this->input->post('statut_demande'),
                'date_ajout' => $current_datetime,
                'observation_demande' => $this->input->post('observation_demande'),
            );
            $this->Educazad_model->insert_data('tb_rm_demandes', $params);
            redirect('demandes/index');
        } else {
            $data['all_candidats'] = $this->Educazad_model->get_multiple('tb_rm_candidats', array(), 'tb_rm_candidats.candidat_id', 'DESC');
            $data['all_offres'] = $this->Educazad_model->get_multiple('tb_rm_offres', array(), 'tb_rm_offres.offre_id', 'DESC');
            $data['_view'] = 'demandes/add';
            $this->load->view('layouts/main', $data);
        }
    }

    /*
     * Editing a tb_am_user
     */
    function edit($demandeID)
    {
        $data['demande'] = $this->Educazad_model->get_one_row('tb_rm_demandes', array('demande_id' => $demandeID));

        if (isset($data['demande'])) {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('offre_sid', 'Offre SID', 'required');
            $this->form_validation->set_rules('candidat_sid', 'Candidat SID', 'required');
            $this->form_validation->set_rules('nom_dossier', 'nom_dossier', 'required');
            if ($this->form_validation->run()) {
                $current_datetime = date('Y-m-d H:i:s');

                //get code department and status
                $code_candidat = strstr($this->input->post('candidat_sid'), '-', true);
                $candidat_sid = (!empty($code_candidat)) ? $code_candidat : $this->input->post('candidat_sid');  //get code department and status
                $code_offre = strstr($this->input->post('offre_sid'), '-', true);
                $offre_sid = (!empty($code_offre)) ? $code_offre : $this->input->post('offre_sid');

                $params = array(
                    'candidat_sid' => $candidat_sid,
                    'offre_sid' => $offre_sid,
                    'date_postule' => $this->input->post('date_postule'),
                    'date_validation' => $this->input->post('date_validation'),
                    'nom_dossier' => $this->input->post('nom_dossier'),
                    'statut_demande' => $this->input->post('statut_demande'),
                    'date_modif' => $current_datetime,
                    'observation_demande' => $this->input->post('observation_demande'),
                );
                $this->Educazad_model->update_data('tb_rm_demandes',$params,  array('demande_id'=>$demandeID));
                redirect('demandes/index');
            } else {
                $data['_view'] = 'demandes/edit';
                $this->load->view('layouts/main', $data);
            }
        } else
            show_error('The tb_am_user you are trying to edit does not exist.');
    }
}