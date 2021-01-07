@section('title')
    @lang('static.menu.profile.index',['name'=>auth()->user()->name])
@endsection
@section('css')
    <script>
        $(function() {
            $('#topSubject').hide();
        })

    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

@endsection

<div>
    <div class="container container-ver2 box-cat-home3 space-50" style="padding-top: 40px">
        <div class="row">
            @livewire('profile-left',['dashboard'=>'active'])
            <!--Start col-md-9-->

            <div class="col-md-9">
                <canvas id="myChart"></canvas>

            </div>
            <!--End col-md-9-->
        </div>
    </div>
</div>

@section('js')
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var chart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'line',

            // The data for our dataset
            data: {
                labels: ['Yanvar', 'Fevral', 'Mart', 'Aprel', 'May', 'İyun', 'İyul'],
                datasets: [
                    {
                        label: 'Barkodla',
                        backgroundColor: 'rgb(0, 102, 204)',
                        borderColor: 'rgb(0, 102, 204)',
                        data: [0, 15, 40, 5, 30, 50, 100]
                    },
                    {
                        label: 'Səbət',
                        backgroundColor: 'rgb(204, 255, 204)',
                        borderColor: 'rgb(204, 255, 204)',
                        data: [0, 40, 50, 2, 20, 30, 45]
                    },
            ]
            },

            // Configuration options go here
            options: {}
        });

    </script>
@endsection
