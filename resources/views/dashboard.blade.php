<x-app-layout>
    

                
                            
    <h1 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('msg.Dashboard') }}
    </h1>

                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">{{ __('msg.Dashboard') }}</li>
                        </ol> 
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body">{{ __('msg.État Créé') }}<br> {{$cree}}</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">{{ __('msg.Voir les détails') }}</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-warning text-white mb-4">
                    <div class="card-body">{{ __('msg.État Invalide') }} <br> {{$invalide}}</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">{{ __('msg.Voir les détails') }}</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-success text-white mb-4">
                    <div class="card-body">{{ __('msg.État Valide') }} <br> {{$valide}}</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">{{ __('msg.Voir les détails') }}</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-danger text-white mb-4">
                    <div class="card-body">{{ __('msg.État À supprimer') }}  <br> {{$asupp}}</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">{{ __('msg.Voir les détails') }}</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-chart-area mr-1"></i>
                {{ __('msg.ga') }}
                <fieldset style="margin-left: 70%">
                    
                <form action="{{ route('dashboard') }}" method="GET">
                    @csrf
                
                <div class="row" >
                <div class="col-md-6">
                    <div class="form-group">
                    <x-jet-label for="year" value="{{ __('msg.year') }}" />
                    <select class="form-select" name="year" id="year">
                        <option value="2012">2012</option>
                        <option value="2013">2013</option>
                        <option value="2014">2014</option>
                        <option value="2015">2015</option>
                        <option value="2016">2016</option>
                        <option value="2017">2017</option>
                        <option value="2018">2018</option>
                        <option value="2019">2019</option>
                        <option value="2020">2020</option>
                        <option value="2021" selected>2021</option>
                    </select>
                </div>
            </div>
                <div class="col-md-6">
                    <div class="form-group">
                    <x-jet-label for="month" value="{{ __('msg.month') }}" />
                    <select class="form-select" name="month" id="month">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5"selected>5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>

                    </select>
                </div>
            </div>
        </div>
        <input type="submit" name="filtrer" value="{{ __('msg.Filtrer')}}"class="btn btn-success btn-icon">
    </form>
    </fieldset>
            </div>
            <div class="card-body"><canvas id="myAreaChart" width="100%" height="30"></canvas></div>
            <div class="card-footer small text-muted">{{ __('msg.mis') }} {{$updateDaye[0]->max}}</div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-chart-bar mr-1"></i>
                        {{ __('msg.gb') }}
                    <form action="{{ route('dashboard') }}" method="GET">
                            @csrf
                        <x-jet-label for="years" value="{{ __('msg.year') }}" />
                        <select class="form-select" name="years" id="years">
                            <option value="2012">2012</option>
                            <option value="2013">2013</option>
                            <option value="2014">2014</option>
                            <option value="2015">2015</option>
                            <option value="2016">2016</option>
                            <option value="2017">2017</option>
                            <option value="2018">2018</option>
                            <option value="2019">2019</option>
                            <option value="2020">2020</option>
                            <option value="2021" selected>2021</option>
                        </select>
                        <input type="submit" name="filtrer" value="{{ __('msg.Filtrer')}}"class="btn btn-success btn-icon">
                    </form>
                    </div>
                    <div class="card-body"><canvas id="myBarChart" width="100%" height="50"></canvas></div>
                    <div class="card-footer small text-muted">{{ __('msg.mis') }} {{$updateMonth[0]->max}}</div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-chart-pie mr-1"></i>
                        {{ __('msg.gc') }}
                    </div>
                    <div class="card-body"><canvas id="myPieChart" width="100%" height="50"></canvas></div>
                    <div class="card-footer small text-muted">{{ __('msg.mis') }} {{$update}}</div>
                </div>
            </div>
        </div>
        
         
</x-app-layout>
<script>
// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

// Pie Chart Example
var ctx = document.getElementById("myPieChart");
var myPieChart = new Chart(ctx, {
type: 'pie',
data: {
labels: ["{{ __('msg.État Créé') }}" , "{{ __('msg.État À supprimer') }}" , "{{ __('msg.État Invalide') }}" , "{{ __('msg.État Valide') }}" ],
datasets: [{
data: [{{$cree }}, {{$asupp }}, {{$invalide }}, {{$valide }}],
backgroundColor: ['#007bff', '#dc3545', '#ffc107', '#28a745'],
}],
},
});
</script>

<script>
    // Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';
{{$var1=1}}
// Area Chart Example
var ctx = document.getElementById("myAreaChart");
var myLineChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: [@foreach ($dataDaye as $d)
        "{{$d->jour}}",  
        @endforeach],
    datasets: [{
      label: "Sessions",
      lineTension: 0.3,
      backgroundColor: "rgba(2,117,216,0.2)",
      borderColor: "rgba(2,117,216,1)",
      pointRadius: 5,
      pointBackgroundColor: "rgba(2,117,216,1)",
      pointBorderColor: "rgba(255,255,255,0.8)",
      pointHoverRadius: 5,
      pointHoverBackgroundColor: "rgba(2,117,216,1)",
      pointHitRadius: 50,
      pointBorderWidth: 2,
      data: [@foreach ($dataDaye as $d)
        {{$var1=$d->nb}},  
        @endforeach],
    }],
  },
  options: {
    scales: {
      xAxes: [{
        time: {
          unit: 'date'
        },
        gridLines: {
          display: false
        },
        ticks: {
          maxTicksLimit: 30
        }
      }],
      yAxes: [{
        ticks: {
          min: 0,
          max: {{$var1}}+1,
          maxTicksLimit: 30
        },
        gridLines: {
          color: "rgba(0, 0, 0, .125)",
        }
      }],
    },
    legend: {
      display: false
    }
  }
});

</script>
<script>
    // Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';
{{$var2=1}}
// Bar Chart Example
var ctx = document.getElementById("myBarChart");
var myLineChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: [@foreach ($dataMonth as $d)
        "Mois {{$d->month}}",  
        @endforeach],
    datasets: [{
      label: "Revenue",
      backgroundColor: "rgba(2,117,216,1)",
      borderColor: "rgba(2,117,216,1)",
      data: [@foreach ($dataMonth as $d)
      {{$var2=$d->nb}},  
        @endforeach],
    }],
  },
  options: {
    scales: {
      xAxes: [{
        time: {
          unit: 'month'
        },
        gridLines: {
          display: false
        },
        ticks: {
          maxTicksLimit: 12
        }
      }],
      yAxes: [{
        ticks: {
          min: 0,
          max: {{$var2}}+1,
          maxTicksLimit: 12
        },
        gridLines: {
          display: true
        }
      }],
    },
    legend: {
      display: false
    }
  }
});

</script>