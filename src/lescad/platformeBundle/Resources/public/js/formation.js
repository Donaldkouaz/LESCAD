
$(document).ready(function () {
    /*
     * Ecoutons l'évènement click()
     */
    $("#lescad_platformebundle_demandecours_departement").change(function () {
         var param = 'dep=' + $("#lescad_platformebundle_demandecours_departement").val();
        $('#lescad_platformebundle_demandecours_ville').load('http://localhost/lescad/web/app_dev.php/ajax #form_ville option', param );

    });
});

