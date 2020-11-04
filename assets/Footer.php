    <footer class="rodape navbar-dark bg-dark text-center">
        <div class="">
            <span class="text-light font-weight-light"><b>Pandora Express 2020 - Todos os direitos reservados</b></span>
        </div> 
    </footer>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4"></script>
    <script src="./js/Functions.js"></script>
    <script src="./js/DataTables.js"></script>
    <script>
        var ctx = document.getElementById('grafEntregas').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: [
                    '<?= 'Cliente 1'; ?>',
                    '<?= 'Cliente 2'; ?>',
                    '<?= 'Cliente 3'; ?>',
                    '<?= 'Cliente 4'; ?>',
                    '<?= 'Cliente 5'; ?>',
                    '<?= 'Cliente 6'; ?>'
                ],
                datasets: [{
                    label: '# of Votes',
                    data: [9, 8, 3, 5, 2, 3],
                    backgroundColor: [
                        '#e63946',
                        '#0096c7',
                        '#f77f00',
                        '#006d77',
                        '#ff206e',
                        '#efd6ac'
                    ],
                    borderColor: [
                        '#ffffff'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
            }
        });
    </script>
</body>
</html>