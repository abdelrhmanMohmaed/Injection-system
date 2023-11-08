<script>
    document.addEventListener('DOMContentLoaded', function () {
        Highcharts.setOptions({
            colors: ['#ef9a9a', '#5c38e1', '#ffbb55', '#f8ff46', '#24CBE5', '#31e525', '#FF9655', '#FFF263', '#6AF9C4']
        });
        var char = Highcharts.chart('TRRChart', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Laser Reject'
            },
            xAxis: {
                categories: [
                    @foreach($arr as $cat)
                        '{{$cat['week']}}',
                    @endforeach
                ],
                tickmarkPlacement: 'on',
                title: {
                    text: 'Week #',
                },
                labels: {
                    rotation: 0,
                    style: {
                        fontSize: '13px',
                        fontFamily: 'Verdana, sans-serif'
                    }
                },
            },
            rangeSelector: {
                enabled: true,
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Qty'
                },
                // plotLines: [{
                //     color: '#FF0000',
                //     width: 2,
                //     value: 5,
                //     text: 'target',
                // }]
            },
            legend: {
                enabled: true,
            },
            tooltip: {
                split: true,
            },
            series: [{
                name: 'SR',
                data: [
                        @foreach($arr as $scrap)
                    [{{round(($scrap['nio']-$scrap['rework'])/$scrap['total']*100,2)}}],
                    @endforeach
                ],
            }, {
                name: 'SQ',
                data: [
                        @foreach($arr as $scrap)
                    [{{$scrap['nio']-$scrap['rework']}}],
                    @endforeach
                ],
            }, {
                name: 'TRR',
                data: [
                        @foreach($arr as $trr)
                    [{{round($trr['nio']/$trr['total']*100,2)}}],
                    @endforeach
                ],
            }, {
                name: 'TRQ',
                data: [
                        @foreach($arr as $trq)
                    [{{$trq['nio']}}],
                    @endforeach
                ],
            }, {
                name: 'PRR',
                data: [
                        @foreach($arr as $prr)
                    [{{round(($prr['nio']-$prr['prr'])/$trr['total']*100,2)}}],
                    @endforeach
                ],
            }, {
                name: 'PRQ',
                data: [
                        @foreach($arr as $prq)
                    [{{$prr['nio']-$prr['prr']}}],
                    @endforeach
                ],
            },
            ]
        });
        var char = Highcharts.chart('inspectTRRChart', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Inspection Reject'
            },
            xAxis: {
                categories: [
                    @foreach($arrInspect as $cat)
                        '{{$cat['week']}}',
                    @endforeach
                ],
                tickmarkPlacement: 'on',
                title: {
                    text: 'Week #',
                },
                labels: {
                    rotation: 0,
                    style: {
                        fontSize: '13px',
                        fontFamily: 'Verdana, sans-serif'
                    }
                },
            },
            rangeSelector: {
                enabled: true,
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Qty'
                },
            },
            legend: {
                enabled: true,
            },
            tooltip: {
                split: true,
            },
            series: [{
                name: 'SR',
                data: [
                        @foreach($arrInspect as $scrap)
                    [{{round(($scrap['nio']-$scrap['rework'])/$scrap['total']*100,2)}}],
                    @endforeach
                ],
            }, {
                name: 'SQ',
                data: [
                        @foreach($arrInspect as $scrap)
                    [{{$scrap['nio']-$scrap['rework']}}],
                    @endforeach
                ],
            }, {
                name: 'TRR',
                data: [
                        @foreach($arrInspect as $trr)
                    [{{round($trr['nio']/$trr['total']*100,2)}}],
                    @endforeach
                ],
            }, {
                name: 'TRQ',
                data: [
                        @foreach($arrInspect as $trq)
                    [{{$trq['nio']}}],
                    @endforeach
                ],
            }, {
                name: 'PRR',
                data: [
                        @foreach($arrInspect as $prr)
                    [{{round(($prr['nio']-$prr['prr'])/$trr['total']*100,2)}}],
                    @endforeach
                ],
            }, {
                name: 'PRQ',
                data: [
                        @foreach($arrInspect as $prq)
                    [{{$prr['nio']-$prr['prr']}}],
                    @endforeach
                ],
            },
            ]
        });
        var char = Highcharts.chart('PaintTypeChart', {
            chart: {
                type: 'column',
                events:{
                    drilldown: function(){
                        this.xAxis[0].update({
                            labels:{
                                rotation: -45
                            }
                        });
                    },
                    drillup: function(){
                        this.xAxis[0].update({
                            labels:{
                                rotation: 0
                            }
                        });
                    }
                }
            },
            title: {
                text: 'Laser Paint Type'
            },
            xAxis: {
                type: 'category',
                tickmarkPlacement: 'on',
                title: {
                    enabled: false
                },
                labels: {
                    rotation: 0,
                    style: {
                        fontSize: '13px',
                        fontFamily: 'Verdana, sans-serif'
                    }
                },
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'qty'
                },
                plotLines: [{
                    line: {
                        lineWidth: 1,
                        marker: {
                            enabled: false
                        }
                    }
                }]
            },
            legend: {
                enabled: true
            },
            tooltip: {
                split: true,
            },
            series: [
                {
                    name: 'SR',
                    data: [
                            @foreach($scrapData as $scrap)
                        {name:'{{$scrap['paint_type']}}',y:{{round(($scrap['nio']-$scrap['rework'])/$scrap['total']*100,2)}},drilldown:'SR{{$scrap['paint_type']}}'},
                        @endforeach
                    ],
                }, {
                    name: 'SQ',
                    data: [
                            @foreach($scrapData as $scrap)
                        {name:'{{$scrap['paint_type']}}',y:{{$scrap['nio']-$scrap['rework']}},drilldown:'SQ{{$scrap['paint_type']}}'},
                        @endforeach
                    ],
                }, {
                    name: 'TRR',
                    data: [
                            @foreach($scrapData as $trr)
                        {name:'{{$trr['paint_type']}}',y:{{round($trr['nio']/$trr['total']*100,2)}},drilldown:'TRR{{$trr['paint_type']}}'},
                        @endforeach
                    ],
                }, {
                    name: 'TRQ',
                    data: [
                            @foreach($scrapData as $trq)
                        {name:'{{$trq['paint_type']}}',y:{{$trq['nio']}},drilldown:'TRQ{{$trq['paint_type']}}'},
                        @endforeach
                    ],
                }, {
                    name: 'PRR',
                    data: [
                            @foreach($scrapData as $prr)
                        {name:'{{$prr['paint_type']}}',y:{{round(($prr['nio']-$prr['prr'])/$prr['total']*100,2)}},drilldown:'PRR{{$prr['paint_type']}}'},
                        @endforeach
                    ],
                }, {
                    name: 'PRQ',
                    data: [
                            @foreach($scrapData as $prq)
                        {name:'{{$prq['paint_type']}}',y:{{$prq['nio']-$prq['prr']}},drilldown:'PRQ{{$prq['paint_type']}}'},
                        @endforeach
                    ],
                },
            ],
            drilldown: {
                series: [
                    @foreach($scrapData as $scrapData)
                    {
                    id: 'SR{{$scrapData['paint_type']}}',
                    name: 'SR',
                    data: [
                       @foreach($scrapData['part'] as $part)
                        {name:'{{$part['part_num']}}',y:{{round(($part['nio']-$part['rework'])/$part['total']*100,2)}},drilldown:'{{$part['part_num']}}'},
                        @endforeach
                    ]
                },
                        @foreach($scrapData['part'] as $def)
                    {
                        id:'{{$def['part_num']}}',
                        name:'Defects',
                        data:[
                            {name: 'Inclusions', y: {{$def['defect']->sum('inclusions')}}},
                            {name: 'Over spray', y: {{$def['defect']->sum('over_spray')}}},
                            {name: 'Missing paint', y: {{$def['defect']->sum('missing_paint')}}},
                            {name: 'Orange Peel', y: {{$def['defect']->sum('orange_peel')}}},
                            {name: 'Liquidation', y: {{$def['defect']->sum('liquidation')}}},
                            {name: 'Shine Spot', y: {{$def['defect']->sum('shine_spot')}}},
                            {name: 'Rough Surface', y: {{$def['defect']->sum('rough_surface')}}},
                            {name: 'Dirt/Stains', y: {{$def['defect']->sum('dirt')}}},
                            {name: 'Scratches', y: {{$def['defect']->sum('scratches')}}},
                            {name: 'Laser defect', y: {{$def['defect']->sum('laser_defect')}}},
                            {name: 'Flash/ Dent', y: {{$def['defect']->sum('flash')}}},
                            {name: 'Short Shot/deformation', y: {{$def['defect']->sum('short_shot')}}},
                            {name: 'Sink Mark', y: {{$def['defect']->sum('sink_mark')}}},
                            {name: 'Mask', y: {{$def['defect']->sum('mask')}}},
                            {name: 'EJECTOR MARK', y: {{$def['defect']->sum('ejector_mark')}}},
                            {name: 'Wrong Jeging', y: {{$def['defect']->sum('wrong_jeging')}}},
                        ],
                        dataLabels: {
                            enabled: true,
                            rotation: 0,
                            color: '#1c5fff',
                            align: 'center',
                            format: '{point.y:.0f}',
                            y: 10,
                            style: {
                                fontSize: '10px',
                                fontFamily: 'Verdana, sans-serif'
                            }
                        }
                    },
                        @endforeach
                    {
                        id: 'SQ{{$scrapData['paint_type']}}',
                        name: 'SQ',
                        data: [
                                @foreach($scrapData['part'] as $part)
                            {name:'{{$part['part_num']}}',y:{{$part['nio']-$part['rework']}}},
                            @endforeach
                        ]
                },{
                        id: 'TRR{{$scrapData['paint_type']}}',
                        name: 'TRR',
                        data: [
                                @foreach($scrapData['part'] as $part)
                            {name:'{{$part['part_num']}}',y:{{round($part['nio']/$part['total']*100,2)}}},
                            @endforeach
                        ]
                    },{
                        id: 'TRQ{{$scrapData['paint_type']}}',
                        name: 'TRQ',
                        data: [
                                @foreach($scrapData['part'] as $part)
                            {name:'{{$part['part_num']}}',y:{{$part['nio']}}},
                            @endforeach
                        ]
                    },{
                        id: 'PRR{{$scrapData['paint_type']}}',
                        name: 'PRR',
                        data: [
                                @foreach($scrapData['part'] as $part)
                            {name:'{{$part['part_num']}}',y:{{round(($part['nio']-$part['prr'])/$part['total']*100,2)}}},
                            @endforeach
                        ]
                    },{
                        id: 'PRQ{{$scrapData['paint_type']}}',
                        name: 'PRQ',
                        data: [
                                @foreach($scrapData['part'] as $part)
                            {name:'{{$part['part_num']}}',y:{{$part['nio']-$part['prr']}}},
                            @endforeach
                        ]
                    },
                    @endforeach
                ]
            }
        });
        var char = Highcharts.chart('inspectPaintTypeChart', {
            chart: {
                type: 'column',
                events:{
                    drilldown: function(){
                        this.xAxis[0].update({
                            labels:{
                                rotation: -45
                            }
                        });
                    },
                    drillup: function(){
                        this.xAxis[0].update({
                            labels:{
                                rotation: 0
                            }
                        });
                    }
                }
            },
            title: {
                text: 'Inspection Paint Type'
            },
            xAxis: {
                type:'category',
                tickmarkPlacement: 'on',
                title: {
                    enabled: false
                },
                labels: {
                    rotation: 0,
                    style: {
                        fontSize: '13px',
                        fontFamily: 'Verdana, sans-serif'
                    }
                },
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'qty'
                },
                plotLines: [{
                    line: {
                        lineWidth: 1,
                        marker: {
                            enabled: false
                        }
                    }
                }]
            },
            legend: {
                enabled: true
            },
            tooltip: {
                split: true,
            },
            series: [
                {
                    name: 'SR',
                    data: [
                            @foreach($scrapInspect as $scrap)
                        {name:'{{$scrap['paint_type']}}',y:{{round(($scrap['nio']-$scrap['rework'])/$scrap['total']*100,2)}},drilldown:'SR{{$scrap['paint_type']}}'},
                        @endforeach
                    ],
                }, {
                    name: 'SQ',
                    data: [
                            @foreach($scrapInspect as $scrap)
                        {name:'{{$scrap['paint_type']}}',y:{{$scrap['nio']-$scrap['rework']}},drilldown:'SQ{{$scrap['paint_type']}}'},
                        @endforeach
                    ],
                }, {
                    name: 'TRR',
                    data: [
                            @foreach($scrapInspect as $trr)
                        {name:'{{$trr['paint_type']}}',y:{{round($trr['nio']/$trr['total']*100,2)}},drilldown:'TRR{{$trr['paint_type']}}'},
                        @endforeach
                    ],
                }, {
                    name: 'TRQ',
                    data: [
                            @foreach($scrapInspect as $trq)
                        {name:'{{$trq['paint_type']}}',y:{{$trq['nio']}},drilldown:'TRQ{{$trq['paint_type']}}'},
                        @endforeach
                    ],
                }, {
                    name: 'PRR',
                    data: [
                            @foreach($scrapInspect as $prr)
                        {name:'{{$prr['paint_type']}}',y:{{round(($prr['nio']-$prr['prr'])/$prr['total']*100,2)}},drilldown:'PRR{{$prr['paint_type']}}'},
                        @endforeach
                    ],
                }, {
                    name: 'PRQ',
                    data: [
                            @foreach($scrapInspect as $prq)
                        {name:'{{$prq['paint_type']}}',y:{{$prq['nio']-$prq['prr']}},drilldown:'PRQ{{$prq['paint_type']}}'},
                        @endforeach
                    ],
                },
            ],
            drilldown: {
                series: [
                        @foreach($scrapInspect as $scrapData)
                    {
                        id: 'SR{{$scrapData['paint_type']}}',
                        name: 'SR',
                        data: [
                                @foreach($scrapData['part'] as $part)
                            {name:'{{$part['part_num']}}',y:{{round(($part['nio']-$part['rework'])/$part['total']*100,2)}},drilldown:'{{$part['part_num']}}'},
                            @endforeach
                        ]
                    },
                    @foreach($scrapData['part'] as $def)
                    {
                        id:'{{$def['part_num']}}',
                        name:'Defects',
                        data:[
                            {name: 'Inclusions', y: {{$def['defect']->sum('inclusions')}}},
                            {name: 'Over spray', y: {{$def['defect']->sum('over_spray')}}},
                            {name: 'Missing paint', y: {{$def['defect']->sum('missing_paint')}}},
                            {name: 'Orange Peel', y: {{$def['defect']->sum('orange_peel')}}},
                            {name: 'Liquidation', y: {{$def['defect']->sum('liquidation')}}},
                            {name: 'Shine Spot', y: {{$def['defect']->sum('shine_spot')}}},
                            {name: 'Rough Surface', y: {{$def['defect']->sum('rough_surface')}}},
                            {name: 'Dirt/Stains', y: {{$def['defect']->sum('dirt')}}},
                            {name: 'Scratches', y: {{$def['defect']->sum('scratches')}}},
                            {name: 'Laser defect', y: {{$def['defect']->sum('laser_defect')}}},
                            {name: 'Flash/ Dent', y: {{$def['defect']->sum('flash')}}},
                            {name: 'Short Shot/deformation', y: {{$def['defect']->sum('short_shot')}}},
                            {name: 'Sink Mark', y: {{$def['defect']->sum('sink_mark')}}},
                            {name: 'Mask', y: {{$def['defect']->sum('mask')}}},
                            {name: 'EJECTOR MARK', y: {{$def['defect']->sum('ejector_mark')}}},
                            {name: 'Wrong Jeging', y: {{$def['defect']->sum('wrong_jeging')}}},
                        ],
                        dataLabels: {
                            enabled: true,
                            rotation: 0,
                            color: '#1c5fff',
                            align: 'center',
                            format: '{point.y:.0f}',
                            y: 10,
                            style: {
                                fontSize: '10px',
                                fontFamily: 'Verdana, sans-serif'
                            }
                        }
                    },
                    @endforeach
                    {
                        id: 'SQ{{$scrapData['paint_type']}}',
                        name: 'SQ',
                        data: [
                                @foreach($scrapData['part'] as $part)
                            {name:'{{$part['part_num']}}',y:{{$part['nio']-$part['rework']}}},
                            @endforeach
                        ]
                    },{
                        id: 'TRR{{$scrapData['paint_type']}}',
                        name: 'TRR',
                        data: [
                                @foreach($scrapData['part'] as $part)
                            {name:'{{$part['part_num']}}',y:{{round($part['nio']/$part['total']*100,2)}}},
                            @endforeach
                        ]
                    },{
                        id: 'TRQ{{$scrapData['paint_type']}}',
                        name: 'TRQ',
                        data: [
                                @foreach($scrapData['part'] as $part)
                            {name:'{{$part['part_num']}}',y:{{$part['nio']}}},
                            @endforeach
                        ]
                    },{
                        id: 'PRR{{$scrapData['paint_type']}}',
                        name: 'PRR',
                        data: [
                                @foreach($scrapData['part'] as $part)
                            {name:'{{$part['part_num']}}',y:{{round(($part['nio']-$part['prr'])/$part['total']*100,2)}}},
                            @endforeach
                        ]
                    },{
                        id: 'PRQ{{$scrapData['paint_type']}}',
                        name: 'PRQ',
                        data: [
                                @foreach($scrapData['part'] as $part)
                            {name:'{{$part['part_num']}}',y:{{$part['nio']-$part['prr']}}},
                            @endforeach
                        ]
                    },
                    @endforeach
                ]
            }
        });
        var char = Highcharts.chart('productionChart', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Production'
            },
            xAxis: {
                categories: [
                    @foreach($keys as $key)
                        '{{$key}}',
                    @endforeach
                ],
                tickmarkPlacement: 'on',
                title: {
                    text: 'Week #',
                },
                labels: {
                    rotation: 0,
                    style: {
                        fontSize: '13px',
                        fontFamily: 'Verdana, sans-serif'
                    }
                },
            },
            rangeSelector: {
                enabled: true,
            },
            yAxis: {
                // min: 0,
                title: {
                    text: 'Qty'
                },
            },
            legend: {
                enabled: true,
            },
            tooltip: {
                split: true,
            },
            series: [{
                name: 'Painting',
                data: [
                        @foreach($keys as $item)
                    [{{isset($painting[$item])?$painting[$item]->sum('qty'):0}}],
                    @endforeach
                ],
            }, {
                name: 'Laser',
                data: [
                        @foreach($keys as $las)
                    [{{isset($laserByWeek[$las])?$laserByWeek[$las]->sum('inner_qty'):0-isset($laserByWeek[$las])?$laserByWeek[$las]->sum('qty'):0}}],
                    @endforeach
                ],
            }, {
                name: 'Inspection',
                data: [
                        @foreach($keys as $ins)
                    [{{isset($inspectByWeek[$ins])?$inspectByWeek[$ins]->sum('inner_qty'):0-isset($inspectByWeek[$ins])?$inspectByWeek[$ins]->sum('qty'):0}}],
                    @endforeach
                ],
            }, {
                name: 'Total',
                data: [
                        @foreach($keys as $total)
                    [{{(isset($painting[$total])?$painting[$total]->sum('qty'):0)+(isset($laserByWeek[$total])?$laserByWeek[$total]->sum('inner_qty'):0-isset($laserByWeek[$total])?$laserByWeek[$total]->sum('qty'):0)+(isset($inspectByWeek[$total])?$inspectByWeek[$total]->sum('inner_qty'):0-isset($inspectByWeek[$total])?$inspectByWeek[$total]->sum('qty'):0)}}],
                    @endforeach
                ],

            },
            ]
        });
        var char = Highcharts.chart('laserChart', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Laser Nio Qty'
            },
            xAxis: {
                type: 'category',
                labels: {
                    rotation: -45,
                    style: {
                        fontSize: '13px',
                        fontFamily: 'Verdana, sans-serif'
                    }
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Qty'
                }
            },
            legend: {
                enabled: true
            },
            tooltip: {
                pointFormat: 'Qty: <b>{point.y:.0f}</b>'
            },
            series: [
                {
                name: 'Qty',
                data: [
                    {name: 'Inclusions', y: {{$laser->sum('inclusions')}}},
                    {name: 'Over spray', y: {{$laser->sum('over_spray')}}},
                    {name: 'Missing paint', y: {{$laser->sum('missing_paint')}}},
                    {name: 'Orange Peel', y: {{$laser->sum('orange_peel')}}},
                    {name: 'Liquidation', y: {{$laser->sum('liquidation')}}},
                    {name: 'Shine Spot', y: {{$laser->sum('shine_spot')}}},
                    {name: 'Rough Surface', y: {{$laser->sum('rough_surface')}}},
                    {name: 'Dirt/Stains', y: {{$laser->sum('dirt')}}},
                    {name: 'Scratches', y: {{$laser->sum('scratches')}}},
                    {name: 'Laser defect', y: {{$laser->sum('laser_defect')}}},
                    {name: 'Flash/ Dent', y: {{$laser->sum('flash')}}},
                    {name: 'Short Shot/deformation', y: {{$laser->sum('short_shot')}}},
                    {name: 'Sink Mark', y: {{$laser->sum('sink_mark')}}},
                    {name: 'Mask', y: {{$laser->sum('mask')}}},
                    {name: 'EJECTOR MARK', y: {{$laser->sum('ejector_mark')}}},
                    {name: 'Wrong Jeging', y: {{$laser->sum('wrong_jeging')}}},
                ],
                dataLabels: {
                    enabled: true,
                    rotation: 0,
                    color: '#1c5fff',
                    align: 'center',
                    format: '{point.y:.0f}',
                    y: 10,
                    style: {
                        fontSize: '10px',
                        fontFamily: 'Verdana, sans-serif'
                    }
                }
            },
                @if($tot !=0)
                {
                    name: 'TRR',
                    data: [
                        {name: 'Inclusions', y: {{round(($laser->sum('inclusions')/$tot)*100,2)}}},
                        {name: 'Over spray', y: {{round(($laser->sum('over_spray')/$tot)*100,2)}}},
                        {name: 'Missing paint', y: {{round(($laser->sum('missing_paint')/$tot)*100,2)}}},
                        {name: 'Orange Peel', y: {{round(($laser->sum('orange_peel')/$tot)*100,2)}}},
                        {name: 'Liquidation', y: {{round(($laser->sum('liquidation')/$tot)*100,2)}}},
                        {name: 'Shine Spot', y: {{round(($laser->sum('shine_spot')/$tot)*100,2)}}},
                        {name: 'Rough Surface', y: {{round(($laser->sum('rough_surface')/$tot)*100,2)}}},
                        {name: 'Dirt/Stains', y: {{round(($laser->sum('dirt')/$tot)*100,2)}}},
                        {name: 'Scratches', y: {{round(($laser->sum('scratches')/$tot)*100,2)}}},
                        {name: 'Laser defect', y: {{round(($laser->sum('laser_defect')/$tot)*100,2)}}},
                        {name: 'Flash/ Dent', y: {{round(($laser->sum('flash')/$tot)*100,2)}}},
                        {name: 'Short Shot/deformation', y: {{round(($laser->sum('short_shot')/$tot)*100,2)}}},
                        {name: 'Sink Mark', y: {{round(($laser->sum('sink_mark')/$tot)*100,2)}}},
                        {name: 'Mask', y: {{round(($laser->sum('mask')/$tot)*100,2)}}},
                        {name: 'EJECTOR MARK', y: {{round(($laser->sum('ejector_mark')/$tot)*100,2)}}},
                        {name: 'Wrong Jeging', y: {{round(($laser->sum('wrong_jeging')/$tot)*100,2)}}},
                    ],
                    dataLabels: {
                        enabled: true,
                        rotation: 0,
                        color: '#1c5fff',
                        align: 'center',
                        format: '{point.y:.2f}',
                        y: 10,
                        style: {
                            fontSize: '10px',
                            fontFamily: 'Verdana, sans-serif'
                        }
                    }
                }
                @endif
            ],
        });
        var char = Highcharts.chart('inspectionTotal', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Inspection Nio Qty'
            },
            xAxis: {
                type: 'category',
                labels: {
                    rotation: -45,
                    style: {
                        fontSize: '13px',
                        fontFamily: 'Verdana, sans-serif'
                    }
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Qty'
                }
            },
            legend: {
                enabled: true
            },
            tooltip: {
                pointFormat: 'Qty: <b>{point.y:.0f}</b>'
            },
            series: [
                {
                name: 'Qty',
                data: [
                    {name: 'Inclusions', y: {{$inspectionT->sum('inclusions')}}},
                    {name: 'Over spray', y: {{$inspectionT->sum('over_spray')}}},
                    {name: 'Missing paint', y: {{$inspectionT->sum('missing_paint')}}},
                    {name: 'Orange Peel', y: {{$inspectionT->sum('orange_peel')}}},
                    {name: 'Liquidation', y: {{$inspectionT->sum('liquidation')}}},
                    {name: 'Shine Spot', y: {{$inspectionT->sum('shine_spot')}}},
                    {name: 'Rough Surface', y: {{$inspectionT->sum('rough_surface')}}},
                    {name: 'Dirt/Stains', y: {{$inspectionT->sum('dirt')}}},
                    {name: 'Scratches', y: {{$inspectionT->sum('scratches')}}},
                    {name: 'Laser defect', y: {{$inspectionT->sum('laser_defect')}}},
                    {name: 'Flash/ Dent', y: {{$inspectionT->sum('flash')}}},
                    {name: 'Short Shot/deformation', y: {{$inspectionT->sum('short_shot')}}},
                    {name: 'Sink Mark', y: {{$inspectionT->sum('sink_mark')}}},
                    {name: 'Mask', y: {{$inspectionT->sum('mask')}}},
                    {name: 'EJECTOR MARK', y: {{$inspectionT->sum('ejector_mark')}}},
                    {name: 'Wrong Jeging', y: {{$inspectionT->sum('wrong_jeging')}}},
                ],
                dataLabels: {
                    enabled: true,
                    rotation: 0,
                    color: '#1c5fff',
                    align: 'center',
                    format: '{point.y:.0f}',
                    y: 10,
                    style: {
                        fontSize: '10px',
                        fontFamily: 'Verdana, sans-serif'
                    }
                }
            },
                @if($inspectTotal !=0)
                {
                    name: 'TRR',
                    data: [
                        {name: 'Inclusions', y: {{round(($inspectionT->sum('inclusions')/$inspectTotal)*100,2)}}},
                        {name: 'Over spray', y: {{round(($inspectionT->sum('over_spray')/$inspectTotal)*100,2)}}},
                        {name: 'Missing paint', y: {{round(($inspectionT->sum('missing_paint')/$inspectTotal)*100,2)}}},
                        {name: 'Orange Peel', y: {{round(($inspectionT->sum('orange_peel')/$inspectTotal)*100,2)}}},
                        {name: 'Liquidation', y: {{round(($inspectionT->sum('liquidation')/$inspectTotal)*100,2)}}},
                        {name: 'Shine Spot', y: {{round(($inspectionT->sum('shine_spot')/$inspectTotal)*100,2)}}},
                        {name: 'Rough Surface', y: {{round(($inspectionT->sum('rough_surface')/$inspectTotal)*100,2)}}},
                        {name: 'Dirt/Stains', y: {{round(($inspectionT->sum('dirt')/$inspectTotal)*100,2)}}},
                        {name: 'Scratches', y: {{round(($inspectionT->sum('scratches')/$inspectTotal)*100,2)}}},
                        {name: 'Laser defect', y: {{round(($inspectionT->sum('laser_defect')/$inspectTotal)*100,2)}}},
                        {name: 'Flash/ Dent', y: {{round(($inspectionT->sum('flash')/$inspectTotal)*100,2)}}},
                        {name: 'Short Shot/deformation', y: {{round(($inspectionT->sum('short_shot')/$inspectTotal)*100,2)}}},
                        {name: 'Sink Mark', y: {{round(($inspectionT->sum('sink_mark')/$inspectTotal)*100,2)}}},
                        {name: 'Mask', y: {{round(($inspectionT->sum('mask')/$inspectTotal)*100,2)}}},
                        {name: 'EJECTOR MARK', y: {{round(($inspectionT->sum('ejector_mark')/$inspectTotal)*100,2)}}},
                        {name: 'Wrong Jeging', y: {{round(($inspectionT->sum('wrong_jeging')/$inspectTotal)*100,2)}}},
                    ],
                    dataLabels: {
                        enabled: true,
                        rotation: 0,
                        color: '#1c5fff',
                        align: 'center',
                        format: '{point.y:.2f}',
                        y: 10,
                        style: {
                            fontSize: '10px',
                            fontFamily: 'Verdana, sans-serif'
                        }
                    }
                }
                @endif
            ],
        });
    });
</script>
