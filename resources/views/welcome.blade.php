@extends('layout.layout')
@section('content')
    <style>
        .addyouasafriend {
            display: flex;
            flex-direction: row;
            justify-content: baseline;
        }

        * {
            font-family: 'NRT-Reg';
            letter-spacing: 0.2rem;
        }

    </style>

    <section class="main">
        <div class="dashboard-container">
            <div class="heading" dir="rtl" style="margin-right: -29rem;">
                <h1><i class="fas fa-chart-bar"></i><span style="padding: 8px;"> پەڕەی سەرەکی</span></h1>
            </div>
            <div class="boxes">
                <div class="box-content">
                    <i class="fas fa-users"></i>
                    <span>{{ $a }} موشتەری</span>
                </div>
                <div class="box-content orange-color">
                    <i class="fas fa-user-friends"></i>
                    <span>{{ $b }} کارمەند</span>
                </div>
                <div class="box-content blue-color">
                    <i class="fas fa-file-invoice"></i>
                    <span>{{ $invoice }} وەسڵ</span>
                </div>
            </div>
            <div class="view-data" dir="rtl">
                <div class="daily line" class="response">
                    <h1> داتای ڕۆژی {{ $thisDay }} </h1>
                    <h2>ژمارەی ئیشەکان:</h2>
                    <h3>{{ $newjobcardtoday }}</h3>
                    <h2>ژمارەی موشتەریەکان:</h2>
                    <h3>{{ $newcustomertoday }}</h3>
                    <h2>قازانج:</h2>
                    <h3>{{ $newprofittoday }}</h3>
                </div>
                <div class="daily">
                    <h1> داتای مانگی {{ $thisMonth }} </h1>
                    <h2>ژمارەی ئیشەکان:</h2>
                    <h3>{{ $newjobcardmonthly }}</h3>
                    <h2>ژمارەی موشتەریەکان:</h2>
                    <h3>{{ $newcustomermonthly }}</h3>
                    <h2>قازانج:</h2>
                    <h3>{{ $newprofitmonthly }}</h3>
                </div>
            </div>
        </div>
        <script src="https://code.highcharts.com/highcharts.js"></script>

        <div id="addyouasafriend" style="display: flex; justify-content:space-around">
            <div id="container" style="height: 333px; width: 28vw; font-weight:bold; font-size: large;"></div>
            <div id="hello" style="height: 333px; width: 28vw; font-weight:bold; font-size: large;" dir="rtl"></div>
            <div id="year" style="height: 273px; width: 28vw; font-weight:bold; font-size: large;"></div>
        </div>

        <script>
            /** The chart of monthly invoice*/
            var data = <?php echo json_encode($dates); ?>;

            Highcharts.setOptions({
                chart: {
                    style: {
                        fontFamily: 'NRT-Reg',
                        fontSize: '15px'
                    },
                    zoomType: 'x',
                },
                lang: {
                    resetZoom: 'دۆخی ئاسایی'
                }
            });

            Highcharts.chart('container', {
                title: {
                    text: "وەسڵی مانگانە",
                    labels: {
                        style: {
                            fontSize: '15px'
                        }
                    }
                },
                xAxis: {
                    categories: ['.'
                        ,'کانونی دووەم'
                        ,'شوبات'
                        ,'ئازار'
                        ,'نيسان'
                        ,'ئایار'
                        ,'حوزەیران'
                        ,'تەمموز'
                        ,'ئاب'
                        ,'ئەیلوول'
                        ,'تشرینی یەكەم'
                        ,'تشرینی دووەم'
                        ,'كانونی یەکەم'
                    ],
                    labels: {
                        style: {
                            fontSize: '15px'
                        }
                    }
                },
                yAxis: {
                    title: {
                        text: "ژمارەی وەسڵ",
                        labels: {
                            style: {
                                fontSize: '15px'
                            }
                        }
                    }
                },
                /** Remove the watermark 'highCharts.com'*/
                credits: {
                    enabled: false
                },
                series: [{
                    name: "hide",
                    data: data
                }],
            });

            /** The chart of Monthly income*/
            var ins = <?php echo json_encode($incomeineachmonth); ?>;
            Highcharts.chart('hello', {
                title: {
                    text: "قازانجی مانگانە",
                    labels: {
                        style: {
                            fontSize: '15px'
                        }
                    }
                },
                xAxis: {
                    categories: ['.'
                        ,'کانونی دووەم'
                        , 'شوبات'
                        , 'ئازار'
                        , 'نيسان'
                        , 'ئایار'
                        , 'حوزەیران'
                        , 'تەمموز'
                        , 'ئاب'
                        , 'ئەیلوول'
                        ,'تشرینی یەكەم'
                        , 'تشرینی دووەم'
                        , 'كانونی یەکەم'
                    ],
                    labels: {
                        style: {
                            fontSize: '15px'
                        }
                    }
                },
                yAxis: {
                    title: {
                        text: "بڕی قازانج",
                        labels: {
                            style: {
                                fontSize: '15px'
                            }
                        }
                    }
                },
                /** Remove the watermark 'highCharts.com' */
                credits: {
                    enabled: false
                },

                series: [{
                    name: "hide",
                    data: ins
                }],
            })

            var i = <?php echo json_encode($usersyearly); ?>;
            var year = <?php echo json_encode($inwhichyear); ?>;
            Highcharts.chart('year', {
                title: {
                    text: "موشتەری ساڵانە ",
                    labels: {
                        style: {
                            fontSize: '15px'
                        }
                    }
                },
                xAxis: {
                    categories: year,
                    labels: {
                        style: {
                            fontSize: '15px'
                        }
                    }
                },
                yAxis: {
                    title: {
                        text: "ڕێژەی موشتەری",
                        labels: {
                            style: {
                                fontSize: '15px'
                            }
                        }
                    }
                },
                /** Remove the watermark 'highCharts.com' */
                credits: {
                    enabled: false
                },

                series: [{
                    name: "hide",
                    data: i
                }],
            })
        </script>
    </section>
@endsection
