<?php
$date_jour = date('Y-m-d');
//Date minimale
//$date_max_naissance = new DateTime($date_jour);
//$date_max_naissance->modify('-18 year');
$date_max_naissance = ((new DateTime())->modify('-18 year'))->format('Y-m-d');
?>
<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Ajouter un nouveau Client</h3>
            </div>
            <?php echo form_open('candidats/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="nom_complet" class="control-label"><span class="text-danger">*</span>Nom complet</label>
						<div class="form-group">
							<input type="text" name="nom_complet" value="<?php echo $this->input->post('nom_complet'); ?>" class="form-control" id="nom_complet" />
							<span class="text-danger"><?php echo form_error('nom_complet');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="email" class="control-label">Adresse Email</label>
						<div class="form-group">
							<input type="email" name="email" value="<?php echo $this->input->post('email'); ?>" class="form-control" id="email" />
							<span class="text-danger"><?php echo form_error('email');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="niveau_etude" class="control-label">Niveau d'etudes</label>
						<div class="form-group">
							<input type="text" name="niveau_etude" value="<?php echo $this->input->post('niveau_etude'); ?>" class="form-control"
                                   id="niveau_etude" />
						</div>
					</div>

					<div class="col-md-6">
						<label for="sexe" class="control-label">Sexe candidat</label>
						<div class="form-group">
							<select name="sexe" class="form-control">
								<option value="">Selectionnez sexe</option>
								<?php 
								$sexe_values = array(
									'Homme'=>'Un homme',
									'Femme'=>'Une femme',
								);

								foreach($sexe_values as $value => $display_text)
								{
									$selected = ($value == $candidat['sexe']) ? ' selected="selected"' : "";

									echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
								} 
								?>
							</select>
							<span class="text-danger"><?php echo form_error('sexe');?></span>

						</div>
					</div>

					<div class="col-md-6">
						<label for="telephone" class="control-label">Candidat Telephone</label>
						<div class="form-group">
							<input type="text" name="telephone" value="<?php echo $this->input->post('telephone'); ?>" class="form-control" id="telephone" />
							<span class="text-danger"><?php echo form_error('telephone');?></span>
						</div>
					</div>
                    <div class="col-md-6">
						<label for="lieu_naissance" class="control-label">Lieu de naissance</label>
						<div class="form-group">
							<input type="text" name="lieu_naissance" value="<?php echo $this->input->post('lieu_naissance'); ?>" class="form-control" id="lieu_naissance" />
							<span class="text-danger"><?php echo form_error('lieu_naissance');?></span>
						</div>
					</div>   <div class="col-md-6">
						<label for="date_naissance" class="control-label">Date de naissance</label>
						<div class="form-group">
							<input type="date" max="<?php echo $date_max_naissance; ?>" name="date_naissance" value="<?php echo $this->input->post('date_naissance'); ?>" class="form-control" id="date_naissance" />
							<span class="text-danger"><?php echo form_error('date_naissance');?></span>
						</div>
					</div> <div class="col-md-6">
						<label for="matricule" class="control-label">Numero Matricule</label>
						<div class="form-group">
							<input type="text" name="matricule" value="<?php echo $this->input->post('matricule'); ?>" class="form-control" id="matricule" />
							<span class="text-danger"><?php echo form_error('matricule');?></span>
						</div>
					</div>
					
					<div class="col-md-6">
						<label for="adresse" class="control-label">Adresse candidat</label>
						<div class="form-group">
							<textarea name="adresse" class="form-control" id="adresse"><?php echo $this->input->post('adresse'); ?></textarea>
						</div>
					</div>
					<div class="col-md-6">
						<label for="observation_candidat" class="control-label">Observation candidat</label>
						<div class="form-group">
							<textarea name="observation_candidat" class="form-control" id="observation_candidat"><?php echo $this->input->post('observation_candidat'); ?></textarea>
						</div>
					</div>
				</div>
			</div>
          	<div class="box-footer">
            	<button type="submit" class="btn btn-success">
            		<i class="fa fa-check"></i> Enregistrer candidat
            	</button>
          	</div>
            <?php echo form_close(); ?>
      	</div>
    </div>
</div>