<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Candidats Listing</h3>
                <div class="box-tools">
                    <a href="<?php echo site_url('candidats/add'); ?>" class="btn btn-success btn-sm">Ajouter un nouveau candidat</a>
                </div>
            </div>
            <div class="box-body">
            <div class="table-responsive">
                <table class="table table-striped table-sm table-condensed">
                    <tr>
                        <th>#</th>
                        <th>Nom candidat</th>
                        <th>Sexe</th>
                        <th>Email</th>
                        <th>Telephone</th>
                        <th>Grade</th>
                        <th>Lieu Naissance</th>
                        <th>Date Naissance</th>
                        <th>Etat-civil</th>
                        <th>Adresse</th>
                        <th>Actions</th>
                    </tr>
                    <?php $count=1; foreach($all_candidats as $t){ ?>
                        <tr>
                            <td><?php echo $count++; ?></td>
                            <td><?php echo $t->nom_complet; ?></td>
                            <td><?php echo $t->sexe; ?></td>
                            <td><?php echo $t->email ?></td>
                            <td><?php echo $t->telephone ?></td>
                            <td><?php echo $t->niveau_etude; ?></td>
                            <td><?php echo $t->lieu_naissance; ?></td>
                            <td><?php echo $t->date_naissance; ?></td>
                            <td><?php echo $t->etat_civil; ?></td>
                            <td><?php echo $t->adresse; ?></td>
                            <td>
                                <a href="<?php echo site_url('candidats/edit/'.$t->candidat_id); ?>"
                                   class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Editer</a>
                            </td>
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
