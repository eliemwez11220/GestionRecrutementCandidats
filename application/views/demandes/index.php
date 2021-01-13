<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Demandes Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('demandes/add'); ?>" class="btn btn-success btn-sm">Creer une nouvelle demande</a>
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Candidat</th>
						<th>Offre</th>
						<th>Date Postule</th>
						<th>Date Validation</th>
						<th>Statut demande</th>
						<th>Observation</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($all_demandes as $t){ ?>
                    <tr>
						<td><?php echo $t->candidat_sid; ?></td>
						<td><?php echo $t->offre_sid; ?></td>
						<td><?php echo $t->date_postule ?></td>
						<td><?php echo $t->date_validation ?></td>
						<td><?php echo $t->statut_demande; ?></td>
						<td><?php echo $t->observation_demande; ?></td>
						<td>
                            <a href="<?php echo site_url('demandes/edit/'.$t->demande_id); ?>" class="btn btn-info btn-xs">
                                <span class="fa fa-pencil"></span> Modifier</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                <div class="pull-right">
                    <?php echo $this->pagination->create_links(); ?>                    
                </div>                
            </div>
        </div>
    </div>
</div>
