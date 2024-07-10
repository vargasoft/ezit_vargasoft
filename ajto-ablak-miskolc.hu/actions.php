<?php 
session_start();
//$_SESSION = array(); session_destroy();



include('config/connect.php');
require_once('config/functions.php');

//print_r($_SESSION);

if($_SESSION['message']!=''){
	echo '
		<!-- Modal ablak -->
		<div class="modal fade" id="dataModal" tabindex="-1" aria-labelledby="dataModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
			<div class="modal-dialog modal-xl" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="dataModalLabel">Hiba!</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<h3>Ön már sikeresen nyilatkozott az előzetes árajánlat elfogadásáról/elutasításáról.</h3>
						<p>
							További teendője egyelőre nincs. 
						</p>
						
					</div>
					
				</div>
			</div>
		</div>
	';
	
	 // JavaScript kód az átirányításhoz
    echo '
        <script>
            setTimeout(function(){
                window.location.href = "https://miskolc-ablak.hu/";
            }, 2000); // 5 másodperc után átirányítás
        </script>
    ';
	
}

// Funkció hívása az "offer" paraméter alapján
	if(isset($_POST['executionDate']) && $_SESSION['message']==''){
		$executionDate = $_POST['executionDate'];
		echo '
			<!-- Modal ablak -->
			<div class="modal fade" id="dataModal" tabindex="-1" aria-labelledby="dataModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
				<div class="modal-dialog modal-xl" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="dataModalLabel">Sikeres művelet</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
							<h3>Az előzetes árajánlatot elfogadta és sikeresen mentettük időpontfoglalási kérelmét is!</h3>
							<p>
								További teendője egyelőre nincs. Kollégánk hamarosan keresni fogja Önt telefonon vagy emailben. 
								Kérem ezért az elkövetkező időben ellenőrizze email postafiókját is, hiszen elképzelhető, hogy időpontfoglalási kérelmét 
								online fogjuk megerősíteni.
							</p>
							
						</div>
						<div class="modal-footer">
							<button type="button" style="min-width:100%" class="btn btn-secondary" data-bs-dismiss="modal">Bezárás</button>
							
						</div>
					</div>
				</div>
			</div>
		';
		
		
		//email küldése
		$to  = $_SESSION['email'];
		$additional_emails = 'info@miskolc-ablak.hu';
		$subject = 'Miskolc Ablak - Árajánlat elfogadva. Időpont javaslat érkezett ('.$_SESSION['name'].')';
		$message = '
			<h3>Kedves '.$_SESSION['name'].',&nbsp;</h3>

			<p>k&ouml;sz&ouml;nj&uuml;k, hogy elfogadta előzetes &aacute;raj&aacute;nlatunkat &eacute;s a helysz&iacute;ni felm&eacute;r&eacute;sre időpontot v&aacute;lasztott.</p>

			<p>Az &Ouml;n &aacute;ltal kiv&aacute;lasztott időpontr&oacute;l munkat&aacute;rsunkat &eacute;rtes&iacute;tett&uuml;k. Hamarosan fel fogja &Ouml;nt keresni tov&aacute;bbi</p>

			<p>egyeztet&eacute;s c&eacute;lj&aacute;b&oacute;l. &Ouml;nnek egyelőre tov&aacute;bbi teendője nincs.</p>

			<p>&nbsp;</p>

			<hr />
			<p>Ügyfél címe: '.$_SESSION['cim'].'</p>
			<p>Kiválasztott szolgáltatás: '.$_SESSION['szolgaltatas'].'</p>
			<p>Az előzetes &aacute;raj&aacute;nlat &ouml;sszege:&nbsp; '.$_SESSION['arajanlat'].'</p>
			<p>&Uuml;gyf&eacute;l &aacute;ltal kiv&aacute;lasztott időpont helysz&iacute;ni felm&eacute;r&eacute;sre: '.$executionDate.'</p>

			<hr />
			<p>&nbsp;</p>

			<p>Amennyiben tov&aacute;bbi k&eacute;rd&eacute;se vagy &eacute;szrev&eacute;tele van, keressen el&eacute;rhetős&eacute;geink egyik&eacute;n.</p>

			<p>&Uuml;dv&ouml;zlettel,</p>

			<p><em>MATA Oszk&aacute;r</em><br />
			<strong>MISKOLC ABLAK</strong><br />
			Tel.: +36 (30) 103-1740<br />
			Email:&nbsp;<a href="mailto:info@miskolc-ablak.hu" target="_blank">info@miskolc-ablak.hu</a><br />
			Web:&nbsp;<a href="https://miskolc-ablak.hu/" target="_blank">https://miskolc-ablak.hu</a></p>

			<table border="1" bordercolor="#fff" cellpadding="5" cellspacing="0" style="border-collapse:collapse; width:100%">
				<tbody>
					<tr>
						<td colspan="3">
						<h3>&nbsp;</h3>
						</td>
					</tr>
				</tbody>
			</table>

		';
		
		// To send HTML mail, the Content-type header must be set
		$headers = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
		$headers .= 'To: '.$_SESSION['name'].' <'.$_SESSION['email'].'>' . "\r\n";
		$headers .= 'From: ' . 'Miskolc Ablak' . ' <info@miskolc-ablak.hu>' . "\r\n";
		$headers .= 'Cc: ' . $additional_emails . "\r\n";
    

			if (mail($to, $subject, $message, $headers)) {
					//echo "email kiküldve";
			}else{
			//	echo "hiba a mail küldésekro";
			}

		
		updateArajanlatStatus($conn, $_SESSION['id'], $executionDate, 2);	
		
		// JavaScript kód az átirányításhoz
		echo '
			<script>
				setTimeout(function(){
					window.location.href = "https://miskolc-ablak.hu/";
				}, 5000); // 5 másodperc után átirányítás
			</script>
		';
		
	}
	
if(isset($_GET['id'])) {
    $offer = $_GET['offer'];
	$id = $_GET['id'];
	$id = str_replace('Lts', '', $id); // Az 'Lts' string eltávolítása
	$id = substr($id, -3); // Az utolsó három karakter kivágása
	$_SESSION['id'] = $id;
	//echo $id."<br>";

    
	
	
		
		
    if($offer == 'accept') {
		
		$get_arajanlat_details_by_id = get_arajanlat_details_by_id($id);
		foreach($get_arajanlat_details_by_id as $details) {
			$nev = $details['nev'];
			$cím = $details['cim'];
			$email = $details['email'];
			$telefon = $details['telefonszam'];
			$szolgaltatas = $details['szolgaltatas'];
			$arajanlat = $details['offer'];
			$status = $details['status'];
			
			$_SESSION['arajanlat'] = $arajanlat;
			$_SESSION['name'] = $nev;
			$_SESSION['email'] = $email;
			$_SESSION['szolgaltatas'] = $szolgaltatas;
			$_SESSION['cim'] = $details['cim'];
			
			$offer_formatted = number_format($arajanlat, 0, ',', '.');
		}
		
		
		echo '
			<!-- Modal ablak -->
			<div class="modal fade" id="dataModal" tabindex="-1" aria-labelledby="dataModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
				<div class="modal-dialog modal-xl" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="dataModalLabel">Előzetes árajánlat elfogadása</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
							<h3>Kedves '.$nev.'</h3>
							<p>
								Köszönjük bizalmát. Ön az előzetes árajánlatot elfogadására készül. A pontos és végleges árajánlat elkészítéséhez 
								elengedhetetlen hogy a helyszínen is elvégezzük a beépítéshez szükséges méréseket. Szeretnék egyeztetni is Önnel a kivitelezés részleteiről, 
								ezért kérem ellenőrizze adatait és <strong>válasszon ki egy időpontot a helyszíni felmérésre</strong>.
							</p>
							<form id="Elfogad" method="POST">
								<div class="row">
									<div class="col-md-4 mb-3">
										<label for="customerName" class="form-label">Ügyfél neve</label>
										<input type="text" class="form-control" id="customerName" value="'.$nev.'" disabled>
									</div>
									<div class="col-md-4 mb-3">
										<label for="address" class="form-label">Cím</label>
										<input type="text" class="form-control" id="address" placeholder="Cím" value="'.$cím.'" disabled>
									</div>
									<div class="col-md-4 mb-3">
										<label for="phoneNumber" class="form-label">Telefonszáma</label>
										<input type="tel" class="form-control" id="phoneNumber" placeholder="Telefonszáma" value="'.$telefon.'" disabled>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6 mb-3">
										<label for="email" class="form-label">Email címe</label>
										<input type="email" class="form-control" id="email" placeholder="Email címe" value="'.$email.'">
									</div>
									<div class="col-md-6 mb-3">
										<label for="service" class="form-label">Kiválasztott szolgáltatás</label>
										<input type="text" class="form-control" id="service" value="'.$szolgaltatas.'" disabled>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12 mb-3">
										<label for="executionDate" class="form-label">Kivitelezés ideje</label>
										<input type="datetime-local" style="font-size: 2rem;" class="form-control" id="executionDate" name="executionDate">
										<div id="executionDateError" class="text-danger"></div>
									</div>
								</div>

								<script>
									function validateForm() {
										var executionDateInput = document.getElementById("executionDate");
										var executionDateError = document.getElementById("executionDateError");
										var executionDateValue = executionDateInput.value;

										if (!executionDateValue) {
											executionDateError.textContent = "Kérjük, töltse ki ezt a mezőt!";
											return false; // A form nem küldhető el
										} else {
											executionDateError.textContent = "";
											return true; // A form elküldhető
										}
									}

									// A mező elveszti a fókuszt, ellenőrizze a kitöltöttséget
									document.getElementById("executionDate").addEventListener("blur", validateForm);

									// Űrlap elküldése előtti ellenőrzés
									document.getElementById("myForm").addEventListener("submit", function(event) {
										if (!validateForm()) {
											event.preventDefault(); // Az űrlap elküldése megakadályozása
										}
									});
								</script>
								<div class="row">
									<div class="col-md-12 mb-3">
										<div class="col-md-12 mb-3">
											<label for="additionalInfo" class="form-label">Előzetes árajánlat összege</label>
											<input type="text" style="font-size: 2rem;" class="form-control" id="offer" value="'.$offer_formatted.'.- Forint" disabled>
										</div>
									</div>
								
								</div>
								<div class="row">
									<div class="col-md-12 mb-3">
									<div class="form-check mt-3">
									  <input class="form-check-input form-check-input-lg" type="checkbox" value="" style="width: 2em;height: 2em;" id="elolvastamCheckbox" required>
									  <label class="form-check-label fs-5 text-center" for="elolvastamCheckbox">
										&nbsp;&nbsp;Elolvastam és elfogadom az <a href="">Általános Szerződési Feltételeket</a>
									  </label>
									</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12 mb-3">
										<button type="submit" style="min-width:100%;bs-btn-line-height: 44.5px;" class="btn btn-primary">Elfogadom az előzetes árajánlatot</button>
									</div>
								</div>

							</form>
							<hr />
							
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Bezárás</button>
							
						</div>
					</div>
				</div>
			</div>
		';
		
		
       
    } elseif($offer == 'notaccept') {
        updateArajanlatStatus($conn, $id, 0);
    } elseif($offer == 'details') {
        updateArajanlatStatus($conn, $id, 10);
    }
}else{
	echo "hiba";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Árajánlatkérés kezelése - Miskolc Ablak</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
  <style>
    /* CSS a teljes háttérbe helyezett videóhoz */
    #background-video {
      position: fixed;
      top: 50%;
      left: 50%;
      min-width: 100%;
      min-height: 100%;
      width: auto;
      height: auto;
      z-index: -1;
      transform: translateX(-50%) translateY(-50%);
      transition: 1s opacity;
    }
  </style>
</head>
<body>
  <!-- Háttér videó -->
  <video autoplay muted loop id="background-video">
    <source src="videos/promo_vid_miskolc_ablak.hu.mp4" type="video/mp4">
    A böngésző nem támogatja a videó lejátszást.
  </video>

 
  <!-- Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
  flatpickr("#executionDate", {
    enableTime: true,
    minDate: "today", // A múltbeli napok kiküszöbölése
    maxDate: new Date(new Date().setFullYear(new Date().getFullYear() + 1)), // A következő évig
    dateFormat: "Y-m-d H:i", // Dátum és idő formátum
    time_24hr: true, // 24 órás időformátum
    defaultHour: 8, // Alapértelmezett óra
    defaultMinute: 0, // Alapértelmezett perc
    locale: {
      firstDayOfWeek: 0, // Hétfő legyen az első nap
      weekdays: {
        shorthand: ['H', 'K', 'Sze', 'Cs', 'P', 'Szo', 'V'], // Magyar rövidítések
        longhand: ['Hétfő', 'Kedd', 'Szerda', 'Csütörtök', 'Péntek', 'Szombat', 'Vasárnap'] // Magyar teljes név
      }
    },
    disable: [
      function(date) {
        // Vasárnapok letiltása (vasárnap 0)
        return (date.getDay() === 6);
      }
    ]
  });
</script>



  <script>
    // Modal megjelenítése
    document.addEventListener('DOMContentLoaded', function() {
      var myModal = new bootstrap.Modal(document.getElementById('dataModal'), {
        keyboard: false
      });
      myModal.show();
    });
	
	
  </script>
  <script>
  // Küldés gomb eseménykezelője
  document.getElementById('submitBtn').addEventListener('click', function() {
    // Ellenőrizze, hogy a jelölőnégyzet ki van-e választva
    if (document.getElementById('elolvastamCheckbox').checked) {
      // Ha ki van választva, akkor elküldheti az űrlapot vagy végezheti más műveletet
      alert('Az űrlap elküldése...');
    } else {
      // Ha nincs kiválasztva, akkor figyelmeztetést jelenít meg
      alert('Kérjük, olvassa el és fogadja el az Általános Szerződési Feltételeket!');
    }
  });
</script>
<script>
  // JavaScript függvény a dátum és idő beállításához
  document.getElementById('executionDate').addEventListener('input', function() {
    var now = new Date(); // jelenlegi idő
    var selectedDate = new Date(this.value); // kiválasztott idő
    var selectedHour = selectedDate.getHours(); // kiválasztott óra

    // Ha a kiválasztott dátum a múltban van, vagy az idő a 8 és 18 óra között van
    if (selectedDate < now || selectedHour < 8 || selectedHour >= 18) {
      // Állítsuk vissza a kiválasztott értéket a jelenlegi időre
      var currentISODate = now.toISOString().slice(0, 16);
      this.value = currentISODate;
    }
  });
</script>
<script>
    function validateForm() {
        var executionDateInput = document.getElementById("executionDate");
        var executionDateError = document.getElementById("executionDateError");
        var executionDateValue = executionDateInput.value;

        if (!executionDateValue) {
            executionDateError.textContent = "Kérjük, válasszon ki időpontot a helyszíni felméréshez!";
            return false; // A form nem küldhető el
        } else {
            executionDateError.textContent = "";
            return true; // A form elküldhető
        }
    }

    // A mező elveszti a fókuszt, ellenőrizze a kitöltöttséget
    document.getElementById("executionDate").addEventListener("blur", validateForm);

    // Űrlap elküldése előtti ellenőrzés
    document.getElementById("Elfogad").addEventListener("submit", function(event) {
        if (!validateForm()) {
            event.preventDefault(); // Az űrlap elküldése megakadályozása
        }
    });
</script>
</body>
</html>
