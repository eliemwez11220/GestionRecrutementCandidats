<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Ajouter une offre</h3>
            </div>
            <?php echo form_open('offres/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="intitule" class="control-label"><span class="text-danger">*</span>Intitule Offre</label>
						<div class="form-group">
							<input type="text" name="intitule" value="<?php echo $this->input->post('intitule'); ?>" class="form-control" id="intitule" />
							<span class="text-danger"><?php echo form_error('intitule');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="poste_offre" class="control-label">Poste Fonction Recherchee</label>
						<div class="form-group">
							<input type="text" name="poste_offre" value="<?php echo $this->input->post('poste_offre'); ?>" class="form-control" id="poste_offre" />
							<span class="text-danger"><?php echo form_error('poste_offre');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="reference" class="control-label">Numero reference</label>
						<div class="form-group">
							<input type="text" name="reference" value="<?php echo $this->input->post('reference'); ?>" class="form-control" id="reference" />
						</div>
					</div>

					<div class="col-md-6">
						<label for="type_contrat" class="control-label">Type de contrat</label>
						<div class="form-group">
							<select name="type_contrat" class="form-control">
								<option value="">Selectionnez type contrat</option>
								<?php 
								$agence_type_values = array(
									'CDI'=>'Duree indeterminee',
									'CDD'=>'Duree determinee',
								);

								foreach($agence_type_values as $value => $display_text)
								{
									$selected = ($value == $offre['type_contrat']) ? ' selected="selected"' : "";

									echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
								} 
								?>
							</select>
							<span class="text-danger"><?php echo form_error('type_contrat');?></span>

						</div>
					</div>

					<div class="col-md-12">
						<label for="observation_offre" class="control-label">Observation</label>
						<div class="form-group">
							<textarea name="observation_offre" class="form-control" id="observation_offre"><?php echo $this->input->post('observation_offre'); ?></textarea>
						</div>
					</div>
				</div>
			</div>
          	<div class="box-footer">
            	<button type="submit" class="btn btn-success">
            		<i class="fa fa-check"></i> Enregistrer Offre
            	</button>
          	</div>
            <?php echo form_close(); ?>
      	</div>
    </div>
</div>