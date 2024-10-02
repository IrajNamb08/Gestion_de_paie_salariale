@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-sm-6 col-lg-3">
        <div class="overview-item ">
            <div class="overview__inner">
                <div class="overview-box clearfix">
                    <div class="icon">
                        <i class="zmdi zmdi-account-o"></i>
                    </div>
                    <div class="text">
                        <h2>{{$employer}}</h2>
                        <span>Employers</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-3">
        <div class="overview-item ">
            <div class="overview__inner">
                <div class="overview-box clearfix">
                    <div class="icon">
                        <i class="far fa-building"></i>
                    </div>
                    <div class="text">
                        <h2>{{$departement}}</h2>
                        <span>Départements</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-3">
        <div class="overview-item ">
            <div class="overview__inner">
                <div class="overview-box clearfix">
                    <div class="icon">
                        <i class="fas fa-briefcase"></i>
                    </div>
                    <div class="text">
                        <h2>{{$fonctionCount}}</h2>
                        <span>Fonctions</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-3">
        <div class="overview-item ">
            <div class="overview__inner">
                <div class="overview-box clearfix">
                    <div class="icon">
                        <i class="zmdi zmdi-money"></i>
                    </div>
                    <div class="text">
                        <h2>{{number_format($totalSalaires,2)}} Ar</h2>
                        <span>Total salaires</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row mt-3">
    <div class="col-lg-6">
        <h2 class="title-1 m-b-25">5 meilleurs salariés</h2>
        <div class="au-card au-card--bg-blue au-card-top-countries m-b-40">
            <div class="au-card-inner">
                <div class="table-responsive">
                    <table class="table table-top-countries">
                        <tbody>
                            @foreach($topSalaries as $employer)
                                <tr>
                                    <td>{{ $employer->nom }} {{ $employer->prenom }}</td>
                                    <td>{{ $employer->fonction->fonction }}</td>
                                    <td>{{ number_format($employer->salaire, 2) }} Ar</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="au-card chart-percent-card">
            <div class="au-card-inner">
                <h3 class="title-2 tm-b-5">Répartition des contrats (%)</h3>
                <div class="row no-gutters">
                    <div class="col-xl-6">
                        <div class="chart-note-wrap">
                            <div class="chart-note mr-0 d-block">
                                <span class="dot dot--blue"></span>
                                <span>CDI</span>
                            </div>
                            <div class="chart-note mr-0 d-block">
                                <span class="dot dot--red"></span>
                                <span>CDD</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="percent-chart">
                            <canvas id="percent-chart" height="280" width="280"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
