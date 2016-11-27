
<table id="toto" class="table">

    <thead>
        <tr>
            <th>Nom gare</th>
            <th>&Eacute;venement</th>
            <th>Date d&eacute;but</th>
            <th>Date fin</th>
            <th>Ville</th>
        </tr>  
    </thead>
    <tbody>

        <?php
        include 'config.php';
        /*$villdep = $_POST['villedep'];
        $villea = $_POST['villearr'];*/

        $datedep = $_POST['ville1'];
        $datearr = $_POST['ville2'];

        $dateStringDeb = $datedep[6] . $datedep[7] . $datedep[8] . $datedep[9] . "-" . $datedep[3] . $datedep[4] . "-" . $datedep[0] . $datedep[1] . " " . $datedep[11] . $datedep[12] . $datedep[13] . $datedep[14] . $datedep[15];
        $dateStringarr = $datearr[6] . $datearr[7] . $datearr[8] . $datearr[9] . "-" . $datearr[3] . $datearr[4] . "-" . $datearr[0] . $datearr[1] . " " . $datearr[11] . $datearr[12] . $datearr[13] . $datearr[14] . $datearr[15];

        $datedep = date("Y-m-d H:i:s ", strtotime($dateStringDeb));
        $datearr = date("Y-m-d H:i:s ", strtotime($dateStringarr));

        //$val=  isset()$_POST["check1"];
        //$nomct=$
        $query = $db->query("select v.nom_ville,g.nom_gare,e.nom_evenement,e.date_debut,e.date_fin from gare as g,evenement as e,ville as v where v.id_ville=g.id_ville and e.id_ville=v.id_ville"
                . " and date_debut >= '$datedep' and date_fin<'$datearr' order by  date_debut asc");

        while ($row = $query->fetch_assoc()) {
            $data0 = $row['nom_gare'];
            $data1 = $row['nom_evenement'];
            $data2 = $row['date_debut'];
            $data3 = $row['date_fin'];
            $data4 = $row['nom_ville'];
            ?>

            <tr>
                <td><?php echo $data0; ?></td>
                <td><?php echo $data1; ?></td>
                <td><?php echo date("d-m-Y H:i", strtotime($data2)); ?></td>
                <td><?php echo date("d-m-Y H:i", strtotime($data3)); ?></td>
                <td><?php echo $data4; ?></td>
            </tr>

        <?php }
        ?>

    </tbody>
</table>
