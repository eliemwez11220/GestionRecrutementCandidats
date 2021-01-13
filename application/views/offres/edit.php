<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Modification infos Client</h3>
            </div>
			<?php echo form_open('client/edit/'.$tb_am_client['client_id']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="client_fullname" class="control-label"><span class="text-danger">*</span>Nom complet du client</label>
						<div class="form-group">
							<input type="text" name="client_fullname" value="<?php echo ($this->input->post('client_fullname') ? $this->input->post('client_fullname') : $tb_am_client['client_fullname']); ?>" class="form-control" id="client_fullname" />
							<span class="text-danger"><?php echo form_error('client_fullname');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="client_email" class="control-label">Adresse Email</label>
						<div class="form-group">
							<input type="text" name="client_email" value="<?php echo ($this->input->post('client_email') ? $this->input->post('client_email') : $tb_am_client['client_email']); ?>" class="form-control" id="client_email" />
							<span class="text-danger"><?php echo form_error('client_email');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="client_profession" class="control-label">Client Profession</label>
						<div class="form-group">
							<input type="text" name="client_profession" value="<?php echo ($this->input->post('client_profession') ? $this->input->post('client_profession') : $tb_am_client['client_profession']); ?>" class="form-control" id="client_profession" />
						</div>
					</div>


					<div class="col-md-6">
						<label for="client_type" class="control-label">Agence Type</label>
						<div class="form-group">
							<select name="client_type" class="form-control">
								<option value="">Selectionnez le type client</option>
								<?php 
								$agence_type_values = array(
									'Expediteur'=>'Client Expediteur',
									'Beneficiaire'=>'Client  Beneficiaire',
								);

								foreach($agence_type_values as $value => $display_text)
								{
									$selected = ($value == $tb_am_client['client_type']) ? ' selected="selected"' : "";

									echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
								} 
								?>
							</select>
							<span class="text-danger"><?php echo form_error('client_type');?></span>

						</div>
					</div>

					<div class="col-md-6">
						<label for="client_phone" class="control-label">Client Phone</label>
						<div class="form-group">
							<input type="text" name="client_phone" value="<?php echo ($this->input->post('client_phone') ? $this->input->post('client_phone') : $tb_am_client['client_phone']); ?>" class="form-control" id="client_phone" />
							<span class="text-danger"><?php echo form_error('client_phone');?></span>
						</div>
					</div>
					
					<div class="col-md-6">
						<label for="client_adresse" class="control-label">Client Adresse</label>
						<div class="form-group">
							<textarea name="client_adresse" class="form-control" id="client_adresse"><?php echo ($this->input->post('client_adresse') ? $this->input->post('client_adresse') : $tb_am_client['client_adresse']); ?></textarea>
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