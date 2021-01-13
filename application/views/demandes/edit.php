<?php
$date_jour = date('Y-m-d');
//Date minimale
$date_max_naissance = ((new DateTime())->modify('-18 year'))->format('Y-m-d');
?>
<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Modification infos Candidat</h3>
            </div>
			<?php echo form_open('demandes/edit/'.$demande['demande_id']); ?>
			<div class="box-body">
                <div class="row clearfix">
                    <div class="col-md-6">
                        <label for="candidat_sid" class="control-label">Candidat demandeur</label>

                        <div class="form-group">
                            <input list="brow_candidat" name="candidat_sid"
                                   class="form-control text-capitalize"
                                   id="candidat_sid" type="text" placeholder="Candidat..."
                                   value="<?= ($demande['candidat_sid'])?$demande['candidat_sid']:set_value('candidat_sid'); ?>">
                            <datalist id="brow_candidat">
                                <option disabled>Selectionnez candidat</option>
                                <?php
                                if (isset($all_candidats)) {
                                    foreach ($all_candidats as $candidat) :?>
                                        <option value="<?= $candidat->candidat_id; ?>-<?= ucwords($candidat->nom_complet); ?>">
                                            <?= ucwords($candidat->nom_complet); ?>
                                        </option>
                                    <?php endforeach;
                                } ?>
                            </datalist>
                            <span class="text-danger small"><?php echo form_error('candidat_sid'); ?></span>
                        </div>

                    </div>

                    <div class="col-md-6">
                        <label for="offre_sid" class="control-label">Offre d'emploi postulee</label>

                        <div class="form-group">
                            <input list="brow_offre" name="offre_sid" class="form-control text-capitalize"
                                   id="offre_sid" type="text" placeholder="Offre..."
                                   value="<?= ($demande['offre_sid'])?$demande['offre_sid']:set_value('offre_sid'); ?>">

                            <datalist id="brow_offre">
                                <option disabled>Selectionnez candidat</option>
                                <?php
                                if (isset($all_offres)) {
                                    foreach ($all_offres as $offre) :?>
                                        <option value="<?= $offre->offre_id; ?>-<?= ucwords($offre->intitule); ?>">
                                            <?= ucwords($offre->intitule); ?>
                                        </option>
                                    <?php endforeach;
                                } ?>
                            </datalist>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="date_postule" class="control-label"><span class="text-danger">*</span>Date de
                            postulation</label>
                        <div class="form-group">
                            <input type="date" name="date_postule"
                                   value="<?php echo ($this->input->post('date_postule'))?$this->input->post('date_postule'):$demande['date_postule']; ?>"
                                   class="form-control" id="date_postule"/>
                            <span class="text-danger"><?php echo form_error('date_postule'); ?></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="date_validation" class="control-label"><span class="text-danger">*</span>Date de
                            validation</label>
                        <div class="form-group">
                            <input type="date" name="date_validation"
                                   value="<?php echo ($this->input->post('date_validation'))?$this->input->post('date_validation'):$demande['date_validation']; ?>"
                                   class="form-control" id="date_validation"/>
                            <span class="text-danger"><?php echo form_error('date_validation'); ?></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="nom_dossier" class="control-label"><span class="text-danger">*</span>Numero ou nom
                            dossier demande</label>
                        <div class="form-group">
                            <input type="text" name="nom_dossier"
                                   value="<?php echo ($this->input->post('nom_dossier'))?$this->input->post('nom_dossier'):$demande['nom_dossier']; ?>"
                                   class="form-control" id="nom_dossier"/>
                            <span class="text-danger"><?php echo form_error('nom_dossier'); ?></span>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="statut_demande" class="control-label">Statut demande</label>
                        <div class="form-group">
                            <select name="statut_demande" class="form-control">
                                <option value="">Selectionnez statut demande</option>
                                <?php
                                $bon_type_values = array(
                                    'Encours' => 'Demande encours',
                                    'Valide' => 'Demande validee',
                                );

                                foreach ($bon_type_values as $value => $display_text) {
                                    $selected = ($value == $this->input->post('statut_demande')) ? ' selected="selected"' : "";

                                    echo '<option value="' . $value . '" ' . $selected . '>' . $display_text . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <label for="observation_demande" class="control-label">Observation sur demande</label>
                        <div class="form-group">
                            <textarea name="observation_demande" class="form-control"
                                      id="observation_demande"><?php echo ($this->input->post('observation_demande'))?$this->input->post('observation_demande'):$demande['observation_demande']; ?></textarea>
                        </div>
                    </div>
                </div>
			</div>
			<div class="box-footer">
            	<button type="submit" class="btn btn-success">
					<i class="fa fa-check"></i> Enregistrer les modifications
				</button>
	        </div>				
			<?php echo form_close(); ?>
		</div>
    </div>
</div>