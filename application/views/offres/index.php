<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Candidats Listing</h3>
                <div class="box-tools">
                    <a href="<?php echo site_url('offres/add'); ?>" class="btn btn-success btn-sm">Ajouter une offre</a>
                </div>
            </div>
            <div class="box-body">
                <div class="table-responsive">
                    <table class="table table-striped table-sm table-condensed">
                        <tr>
                            <th>#</th>
                            <th>Intitule</th>
                            <th>Reference</th>
                            <th>Poste Fonction</th>
                            <th>Type contrat</th>
                            <th>Observation</th>
                        </tr>
                        <?php $count=1; foreach($all_offres as $t){ ?>
                            <tr>
                                <td><?php echo $count++; ?></td>
                                <td><?php echo $t->intitule; ?></td>
                                <td><?php echo $t->reference; ?></td>
                                <td><?php echo $t->poste_offre ?></td>
                                <td><?php echo $t->type_contrat ?></td>
                                <td><?php echo $t->observation_offre; ?></td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
                <div class="pull-right">
                    <?php echo $this->pagination->create_links(); ?>
                </div>
            </div>

        </div>
    </div>
</div>
