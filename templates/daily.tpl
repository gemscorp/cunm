{include file='header.tpl'}
<script type='text/javascript'>
{literal}

function loadDailyStats(json) {
	$('#container').highcharts({

       	title: {
            text: 'Messages Sent'
        },

        subtitle: {
            text: 'Agggregated Daily'
        },

        xAxis: {
            type: 'datetime',
            tickInterval: 7 * 24 * 3600 * 1000, // one week
            tickWidth: 0,
            gridLineWidth: 1,
            labels: {
                align: 'left',
                x: 3,
                y: -3
            }
        },

        yAxis: [{ // left y axis
            title: {
                text: "Messages"
            },
            labels: {
                align: 'left',
                x: 3,
                y: 16,
                formatter: function() {
                    return Highcharts.numberFormat(this.value, 0);
                }
            },
            showFirstLabel: false
        }, { // right y axis
            gridLineWidth: 0,
            opposite: true,
            title: {
                text: "Activations"
            },
            labels: {
                align: 'right',
                x: -3,
                y: 16,
                formatter: function() {
                    return Highcharts.numberFormat(this.value, 0);
                }
            },
            showFirstLabel: false
        }, { // right y axis
            gridLineWidth: 0,
            opposite: true,
            title: {
                text: "Google Signups"
            },
            labels: {
                align: 'right',
                x: -3,
                y: 16,
                formatter: function() {
                    return Highcharts.numberFormat(this.value, 0);
                }
            },
            showFirstLabel: false
        }, { // right y axis
            gridLineWidth: 0,
            opposite: true,
            title: {
                text: "Mobile Activations"
            },
            labels: {
                align: 'right',
                x: -3,
                y: 16,
                formatter: function() {
                    return Highcharts.numberFormat(this.value, 0);
                }
            },
            showFirstLabel: false
        }, { // right y axis
            gridLineWidth: 0,
            opposite: true,
            title: {
                text: "Mobile Signups"
            },
            labels: {
                align: 'right',
                x: -3,
                y: 16,
                formatter: function() {
                    return Highcharts.numberFormat(this.value, 0);
                }
            },
            showFirstLabel: false
        }],

        legend: {
            align: 'left',
            verticalAlign: 'top',
            y: 20,
            floating: true,
            borderWidth: 0
        },

        tooltip: {
            shared: true,
            crosshairs: true
        },

        plotOptions: {
            series: {
                cursor: 'pointer',
                point: {
                    events: {
                        click: function() {
                            hs.htmlExpand(null, {
                                pageOrigin: {
                                    x: this.pageX,
                                    y: this.pageY
                                },
                                headingText: this.series.name,
                                maincontentText: Highcharts.dateFormat('%A, %b %e, %Y', this.x) +':<br/> '+
                                    this.y +' visits',
                                width: 200
                            });
                        }
                    }
                },
                marker: {
                    lineWidth: 1
                }
            }
        },

        series: [{
            name: 'Daily Messages',
            data: json.messages,
            lineWidth: 4,
            yAxis: 0,
            marker: {
                radius: 4
            }
        }, {
        	name: "Activations",
        	data: json.activations,
        	lineWidth: 2,
        	yAxis: 1,
        	marker: {
        		radius: 4
        	}
        }, {
        	name: "Google Signups",
        	data: json.refs,
        	lineWidth: 2,
        	yAxis: 2,
        	marker: {
        		radius: 4
        	}
        }, {
        	name: "Mobile Activations",
        	data: json.mobile_active,
        	lineWidth: 2,
        	yAxis: 3,
        	marker: {
        		radius: 4
        	}
        }, {
        	name: "Mobile Signups",
        	data: json.mobile_signup,
        	lineWidth: 2,
        	yAxis: 4,
        	marker: {
        		radius: 4
        	}
        }]
    });
}

function loadGoogleStats(json) {
	$('#container3').highcharts({

       	title: {
            text: 'Google Stats'
        },

        subtitle: {
            text: 'Agggregated Daily'
        },

        xAxis: {
            type: 'datetime',
            tickInterval: 7 * 24 * 3600 * 1000, // one week
            tickWidth: 0,
            gridLineWidth: 1,
            labels: {
                align: 'left',
                x: 3,
                y: -3
            }
        },

        yAxis: [{ // left y axis
            title: {
                text: "Signups"
            },
            labels: {
                align: 'left',
                x: 3,
                y: 16,
                formatter: function() {
                    return Highcharts.numberFormat(this.value, 0);
                }
            },
            showFirstLabel: false
        }, { // right y axis
            gridLineWidth: 0,
            opposite: true,
            title: {
                text: "Topup Total"
            },
            labels: {
                align: 'right',
                x: -3,
                y: 16,
                formatter: function() {
                    return Highcharts.numberFormat(this.value, 0);
                }
            },
            showFirstLabel: false
        }, { // right y axis
            gridLineWidth: 0,
            opposite: true,
            title: {
                text: "Topup Attempt"
            },
            labels: {
                align: 'right',
                x: -3,
                y: 16,
                formatter: function() {
                    return Highcharts.numberFormat(this.value, 0);
                }
            },
            showFirstLabel: false
        },
        { // right y axis
            gridLineWidth: 0,
            opposite: true,
            title: {
                text: "Topup Count"
            },
            labels: {
                align: 'right',
                x: -3,
                y: 16,
                formatter: function() {
                    return Highcharts.numberFormat(this.value, 0);
                }
            },
            showFirstLabel: false
        }, 
        { // right y axis
            gridLineWidth: 0,
            opposite: true,
            title: {
                text: "Topup Attempt Count"
            },
            labels: {
                align: 'right',
                x: -3,
                y: 16,
                formatter: function() {
                    return Highcharts.numberFormat(this.value, 0);
                }
            },
            showFirstLabel: false
        }
        ],

        legend: {
            align: 'left',
            verticalAlign: 'top',
            y: 20,
            floating: true,
            borderWidth: 0
        },

        tooltip: {
            shared: true,
            crosshairs: true
        },

        plotOptions: {
            series: {
                cursor: 'pointer',
                point: {
                    events: {
                        click: function() {
                            hs.htmlExpand(null, {
                                pageOrigin: {
                                    x: this.pageX,
                                    y: this.pageY
                                },
                                headingText: this.series.name,
                                maincontentText: Highcharts.dateFormat('%A, %b %e, %Y', this.x) +':<br/> '+
                                    this.y +' visits',
                                width: 200
                            });
                        }
                    }
                },
                marker: {
                    lineWidth: 1
                }
            }
        },

        series: [{
            name: 'Google Activations',
            data: json.refs,
            lineWidth: 4,
            yAxis: 0,
            marker: {
                radius: 4
            }
        }, {
        	name: "Topups",
        	data: json.ref_pays,
        	lineWidth: 2,
        	yAxis: 1,
        	marker: {
        		radius: 4
        	}
        }, {
        	name: "Topup Attempt",
        	data: json.ref_pay_attempt,
        	lineWidth: 2,
        	yAxis: 2,
        	marker: {
        		radius: 4
        	}
        },
        {
        	name: "Topup Count",
        	data: json.ref_pay_count,
        	lineWidth: 2,
        	yAxis: 3,
        	marker: {
        		radius: 4
        	}
        },
        {
        	name: "Topup Attempt Count",
        	data: json.ref_pay_attempt_count,
        	lineWidth: 2,
        	yAxis: 4,
        	marker: {
        		radius: 4
        	}
        }
        ]
    });
}

function loadHourlyStats(json)
{
	$('#container2').highcharts({

       	title: {
            text: 'Messages Sent'
        },

        subtitle: {
            text: 'Agggregated Hourly'
        },

        xAxis: {
            type: 'datetime',
            tickInterval: 24 * 3600 * 1000, // one day
            tickWidth: 0,
            gridLineWidth: 1,
            labels: {
                align: 'left',
                x: 3,
                y: -3
            }
        },

        yAxis: [{ // left y axis
            title: {
                text: null
            },
            labels: {
                align: 'left',
                x: 3,
                y: 16,
                formatter: function() {
                    return Highcharts.numberFormat(this.value, 0);
                }
            },
            showFirstLabel: false
        }, { // right y axis
            gridLineWidth: 0,
            opposite: true,
            title: {
                text: null
            },
            labels: {
                align: 'right',
                x: -3,
                y: 16,
                formatter: function() {
                    return Highcharts.numberFormat(this.value, 0);
                }
            },
            showFirstLabel: false
        }],

        legend: {
            align: 'left',
            verticalAlign: 'top',
            y: 20,
            floating: true,
            borderWidth: 0
        },

        tooltip: {
            shared: true,
            crosshairs: true
        },

        plotOptions: {
            series: {
                cursor: 'pointer',
                point: {
                    events: {
                        click: function() {
                            hs.htmlExpand(null, {
                                pageOrigin: {
                                    x: this.pageX,
                                    y: this.pageY
                                },
                                headingText: this.series.name,
                                maincontentText: Highcharts.dateFormat('%A, %b %e, %Y', this.x) +':<br/> '+
                                    this.y +' visits',
                                width: 200
                            });
                        }
                    }
                },
                marker: {
                    lineWidth: 1
                }
            }
        },

        series: [{
            name: 'Hourly Messages',
            data: json,
            lineWidth: 4,
            marker: {
                radius: 4
            }
        }]
    });
}

$(function () {

    // Register a parser for the American date format used by Google
    Highcharts.Data.prototype.dateFormats['m/d/Y'] = {
        regex: '^([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{2})$',
        parser: function (match) {
            return Date.UTC(+('20' + match[3]), match[1] - 1, +match[2]);
        }
    };
    
    Highcharts.setOptions({
    	global: {
    		timezoneOffset: -7 * 60
    	}
    });

    $.get('json/daily', function (json) {
    	loadDailyStats(json);
    });
    
    $.get('json/hourly', function (json) {
        loadHourlyStats(json);
    });
    
    $.get('json/google', function (json) {
        loadGoogleStats(json);
    });
    
    $("#container4").load("google/summary");

    $( ".datepicker" ).datepicker({ "dateFormat" : "yy-mm-dd"});
    
    $("#dailySearch").click(function (e) {
    	e.preventDefault();
    	var startDate = $("#day_start_date").val();
    	var endDate = $("#day_end_date").val();
    	$.get('json/daily/' + startDate + '/' + endDate, function (json) {
        	loadDailyStats(json);
        });
    });
    
    $("#hourlySearch").click(function (e) {
    	e.preventDefault();
    	var startDate = $("#hour_start_date").val();
    	var endDate = $("#hour_end_date").val();
    	$.get('json/hourly/' + startDate + '/' + endDate, function (json) {
        	loadHourlyStats(json);
        });
    });
    
    $("#googleSearch").click(function (e) {
    	e.preventDefault();
    	var startDate = $("#google_start_date").val();
    	var endDate = $("#google_end_date").val();
    	$.get('json/google/' + startDate + '/' + endDate, function (json) {
        	loadGoogleStats(json);
        });
    });
    
    $("#googleSummarySearch").click(function (e) {
    	e.preventDefault();
    	var startDate = $("#google_summary_start_date").val();
    	var endDate = $("#google_summary_end_date").val();
    	$("#container4").load("google/summary/" + startDate + "/" + endDate);
    });
 
});
{/literal}
</script>


<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

Start Date: <input class='datepicker' type='text' id='day_start_date' name='start_date' value='{$day_start}' />
End Date: <input class='datepicker' type='text' id='day_end_date' name='start_date' value='{$day_finish}' />
<button class='btn btn-primary btn-sm' id='dailySearch'>Search</button>

<div id="container3" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

Start Date: <input class='datepicker' type='text' id='google_start_date' name='start_date' value='{$day_start}' />
End Date: <input class='datepicker' type='text' id='google_end_date' name='start_date' value='{$day_finish}' />
<button class='btn btn-primary btn-sm' id='googleSearch'>Search</button>

<div id="container4" style="margin: 0 auto"></div>

Start Date: <input class='datepicker' type='text' id='google_summary_start_date' name='start_date' value='{$hour_start}' />
End Date: <input class='datepicker' type='text' id='google_summary_end_date' name='start_date' value='{$day_finish}' />
<button class='btn btn-primary btn-sm' id='googleSummarySearch'>Search</button>

<div id="container2" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

Start Date: <input class='datepicker' type='text' id='hour_start_date' name='start_date' value='{$hour_start}' />
End Date: <input class='datepicker' type='text' id='hour_end_date' name='start_date' value='{$day_finish}' />
<button class='btn btn-primary btn-sm' id='hourlySearch'>Search</button>


{include file='footer.tpl'}