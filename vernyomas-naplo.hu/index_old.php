<?php 
session_start();

include('config/connect.php');
require_once('config/functions.php');

    if (isset($_POST['person']) && $_POST['person'] == 'Varga Richard') {
        $person = 'Varga Richard';
    } elseif (isset($_POST['person']) && $_POST['person'] == 'Vargáné Bitó Evelin') {
        $person = 'Vargáné Bitó Evelin';
    } else {
        $person = 'No data';
    }
    ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Vérnyomásnapló |  <?php echo $_POST['person'];?></title>
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="dist/event-calendar.css" />
        <link rel="stylesheet" href="https://cdn.dhtmlx.com/fonts/wxi/wx-icons.css" />
        <script src="common/data.js"></script>
        <link rel="stylesheet" href="assets/demos.css" />
        <!-- Event Calendar -->
        <link rel="stylesheet" href="dist/event-calendar.css" />
        <link rel="stylesheet" href="https://cdn.dhtmlx.com/fonts/wxi/wx-icons.css" />
        <script src="dist/event-calendar.js"></script>
        <!-- Demo data -->
        <script src="common/data.js"></script>
        <link rel="stylesheet" href="assets/demos.css" />
		
		<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
		<script src="https://code.highcharts.com/highcharts.js"></script>
		<script src="https://code.highcharts.com/modules/series-label.js"></script>
		<script src="https://code.highcharts.com/modules/exporting.js"></script>
		<script src="https://code.highcharts.com/modules/export-data.js"></script>
		<script src="https://code.highcharts.com/modules/accessibility.js"></script>
		
		<style>
			mark {
				display: none;
			}
			.highcharts-credits {
				display: none;
			}
		</style>
    </head>
    <body>
        <div class="g-wrap">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">Vérnyomásnapló [<?php echo isset($_POST['person']) ? $_POST['person'] : 'Válasszon ki egy személyt!'; ?>]</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav me-auto">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#">Vérnyomásmérés</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Testsúlymérés</a>
                            </li>
                            <li class="nav-item">
                                <?php if (isset($_POST['person']) && $_POST['person'] == 'Varga Richard') { ?>
                                <a class="nav-link" href="#" tabindex="-1" aria-disabled="false">Új felhasználó rögíztése</a>
                                <?php }else{ ?>
                                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Új felhasználó rögíztése</a>
                                <?php } ?>
                            </li>
                        </ul>
                        <span class="navbar-text">
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                <span><?php if (isset($_POST['person'])){ echo $_POST['person'].' (Felhasználóváltás)';}else{ echo 'Felhasználóváltás';}?></span>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item" href="#" onclick="sendPostRequest('Varga Richard')">Varga Richard</a></li>
                                    <li><a class="dropdown-item" href="#" onclick="sendPostRequest('Vargáné Bitó Evelin')">Vargáné Bitó Evelin</a></li>
                                    <li><a class="dropdown-item" href="#" onclick="sendPostRequest('Kijelentkezés')">Kijelentkezés</a></li>
                                </ul>
                            </div>
                        </span>
                    </div>
                </div>
            </nav>
			
            <div class="accordion accordion-flush" id="accordionFlushExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                        Naptár nézet
                        </button>
                    </h2>
                    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <div id="root"></div>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                        Diagramm nézet
                        </button>
                    </h2>
                    <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
							<div id="container_BP" style="width: 100%; height: 400px; margin: 0 auto"></div>
						</div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            new eventCalendar.EventCalendar("#root", {
                config: {
					dragCreate: true,
					dragResize: true,
					dragMove: true,
					eventInfoOnClick: true,
					editorOnDblClick: true,
					createEventOnDblClick: true,
					eventsOverlay: true,
					autoSave: true,
					readonly: true,
				},
				calendars: [ // data for calendars (event types) located on sidebar
					{
						id: "vernyomas",
						label: "Vérnyomásmérés",
						readonly: true,
						active: true,
						color: {
							background: "#740943",
							border: "#0f5fd5",
							textColor: "#eb066e"
						}
					}
					
				],
                mode: "agenda",
				<?php 
					$get_last_entry_by_date = get_last_entry_by_date();
					foreach($get_last_entry_by_date as $last_date) {
						echo 'date: new Date("'.date('Y-m-d\TH:i:s', strtotime($last_date['last_date'])).'"),';
					}
				?>
                events: [
					<?php 
						$get_vernyomas_by_name = get_vernyomas_by_name($person);
						foreach($get_vernyomas_by_name as $vernyomas) {
							$vernyomas_aktualis = $vernyomas['vernyomas'];
							list($systoles, $diastoles) = explode('/', $vernyomas_aktualis);
							$color = '#0f5fd5';
							echo '
							{
								id: "'.$vernyomas['id'].'",
								type: "vernyomas",
								start_date: new Date("'.date('Y-m-d\TH:i:s', strtotime($vernyomas['date'])).'"),
								end_date: new Date("'.date('Y-m-d\TH:i:s', strtotime($vernyomas['date']. ' +1 minutes')).'"),
								text: "Vérnyomás: '.$vernyomas['vernyomas'].' | Pulzus: '.$vernyomas['pulzus'].'",
								color: {
									background: "'.$color.'",
									border: "'.$color.'",
									textColor: "'.$color.'"
								}
							},
							';
						}
					?>

                ]
            });
        </script>
		
<script>
    $(function () {
        var series = [
			
			{
				name: 'Szisztolé',
				color: '#FF9900',
				data: [
				<?php 
					$get_sys_by_name = get_sys_by_name($person);
					foreach($get_sys_by_name as $sys) {
				?>
					[new Date(<?php echo date('Y, n, j, G, i, s', strtotime($sys['date']));?>).getTime(), <?php echo $sys['sys']?>],
				<?php 
					}
				?>
				]
			}
			
			,
			{
				name: 'Diasztolé',
				color: '#0073f9',
				data: [
					<?php 
					$get_dia_by_name = get_dia_by_name($person);
					foreach($get_dia_by_name as $dia) {
					?>
						[new Date(<?php echo date('Y, n, j, G, i, s', strtotime($dia['date']));?>).getTime(), <?php echo $dia['dia']?>],
					<?php 
						}
					?>
				]
			},
			{
				name: 'Pulzus',
				color: '#ffc9fe',
				data: [
					<?php 
					$get_dia_by_name = get_dia_by_name($person);
					foreach($get_dia_by_name as $dia) {
					?>
						[new Date(<?php echo date('Y, n, j, G, i, s', strtotime($dia['date']));?>).getTime(), <?php echo $dia['pulzus']?>],
					<?php 
						}
					?>
				]
			}
		];

        var container_BP = new Highcharts.Chart({
            chart: {
                renderTo: 'container_BP',
                type: 'line'
            },
            title: {
                text: 'Vérnyomás monitorozása'
            },
            xAxis: {
                type: 'datetime',
                labels: {
                    format: '{value:%Y/%m/%d}', // év/hónap/nap óra:perc:másodperc
                    rotation: 45,
                    align: 'left'
                }
            },
            yAxis: [{
                title: {
                    text: 'Vérnyomás (mmHg)'
                },
                plotBands: [{ // Alacsony vérnyomás tartomány
                    from: 0,
                    to: 110,
                    color: '#a8e6cf', // Alacsony vérnyomás (zöld)
                    label: {
                        text: 'Alacsony vérnyomás',
                        style: {
                            color: '#606060'
                        }
                    }
                }, { // Normál vérnyomás tartomány
                    from: 111,
                    to: 129,
                    color: '#dcedc1', // Normál vérnyomás (kék)
                    label: {
                        text: 'Normál vérnyomás',
                        style: {
                            color: '#606060'
                        }
                    }
                }, { // Magas vérnyomás tartomány
                    from: 130,
                    to: 170,
                    color: '#ffd3b6', // Magas vérnyomás (piros)
                    label: {
                        text: 'Magas vérnyomás',
                        style: {
                            color: '#606060'
                        }
                    }
                }, { // Nagyon magas vérnyomás tartomány
                    from: 171,
                    to: 180,
                    color: '#ffaaa5', // Nagyon magas vérnyomás (piros)
                    label: {
                        text: 'Nagyon magas vérnyomás',
                        style: {
                            color: '#606060'
                        }
                    }
                }, 
				{ // Nagyon magas vérnyomás tartomány
                    from: 181,
                    to: 999,
                    color: '#ff8b94', // Nagyon magas vérnyomás (piros)
                    label: {
                        text: 'Nagyon magas vérnyomás',
                        style: {
                            color: '#606060'
                        }
                    }
                }
				]
            }, {
                title: {
                    text: 'Pulzus (b/m)'
                },
                opposite: true
            }],
            tooltip: {
                formatter: function () {
                    var s = '<b>' + Highcharts.dateFormat('%Y/%m/%d %H:%M:%S', this.x) + '</b><br/>';
                    s += 'Vérnyomás: ' + this.points[0].point.y + '/' + this.points[1].point.y + ' mmHg' + '<br/>';
                    s += 'Pulzus: ' + this.points[2].point.y + ' dobbanás/perc<br/>';
                    return s;
                },
                crosshairs: true,
                shared: true
            },

            plotOptions: {
                series: {
                    animation: false,
                    marker: {
                        radius: 3
                    },
                    fillopacity: 0.1
                }
            },

            series: series
        });
    });
</script>





        <script>
            function sendPostRequest(person) {
            	var form = document.createElement('form');
            	form.method = 'post';
            	form.action = window.location.href;
            	var input = document.createElement('input');
            	input.type = 'hidden';
            	input.name = 'person';
            	input.value = person;
            	form.appendChild(input);
            	document.body.appendChild(form);
            	form.submit();
            }
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>