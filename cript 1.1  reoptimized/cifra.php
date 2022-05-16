<!DOCTYPE html>
<html>
    <head>
        <link rel= "stylesheet" href="style.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet"> 
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
        <style media="screen">.hide  {display: none;}</style>
        <title>Cifra</title>
    </head>
    <body class="cifra">
        <nav>
            <ul>
                <div class="animazioneNav">
                    <li><a href="index.php">HOME</a></li>
                    <li><a href="chiSiamo.php">CHI SIAMO</a></li>
                    <li class="algoritmi"><a href="#">ALGORITMI</a>
                </div>
            </ul>
        </nav>
        <div class="container">
            <script src="copy.js"></script>
            <?php require 'crittazione_rsa.php'; require 'RSA.php'; require 'elaborazione1.php'; require 'SYM.php'?>

            <form method="POST" id="form">
                <div class="testi">
                    <aside>
                        <select name="cryptmode" id="cryptmode">
                            <optgroup label ="Simmetrici">
                                <option value="0">RSA creato da noi</option>
                                <option value="1">RSA librerie</option>
                            </optgroup>  
                            <optgroup label ="Asimmetrici">
                                <option value="2">AES</option>
                                <option value="3">Rijndael</option>
                                <option value="4">Twofish</option>
                                <option value="5">Blowfish</option>
                                <option value="6">RS4</option>
                                <option value="7">RS2</option>
                                <option value="8">Triple DES</option>
                                <option value="9">DES</option>
                            </optgroup>
                        </select>
                        <select id="RSAmode" name="RSAmode">
                            <optgroup label ="modalità di cifratura">
                                <option value="PKCS1">PKCS1</option>
                                <option value="OEAP">OEAP</option>
                            </optgroup>
                        </select>
                        <select id="SYMmode" name="SYMmode">
                            <optgroup label ="modalità di cifratura">
                                <option value="CBC">CBC (Cipher Blocker Chaining)</option>
                                <option value="CTR">CTR (Counter mode)</option>
                                <option value="OFB">OFB (Output FeedBack mode)</option>
                                <option value="CFB">CFB (Cipher FeedBack mode)</option>
                                <option value="ECB">ECB (Electronic Codebook)</option>
                            </optgroup>
                        </select>
                    </aside>
                        <div class="testoDaCifrare">
                            <h1>TESTO DA CIFRARE</h1>
                                <!-- inserimento testo da crittare -->
                            <textarea type="textarea" name="critta" placeholder="inserire testo da cifrare qui" class="testoPadding"><?php if(isset($_POST["critta"])){echo $plaintext;}else{}?></textarea><br>
                        </div>
                            <!-- barre di visualizzazione dati --> 
                            <?php if(isset($_POST["critta"]))
                            {
                                if($rsa_propietario == true)
                                {echo "<input type='text' name='useless' id='cryptkey' value='Private Key(".$n.",".$d.")' style='width:240px;'></input><br>";}
                                if($rsa_librerie == true)
                                {echo "<input type='text' name='useless' id='cryptkey' value='".file_get_contents("pub.txt")."' style='width:240px;'></input><br>";}
                                if($AES || $RIJ || $TWF || $BLF || $RC4 || $RC2 || $DES3 || $DES == true)
                                {echo "<input type='text' name='useless' id='cryptkey' value='".$keydec."' style='width:240px;'></input><br>";}
                            }
                            ?>
                        <div class="switch">
                            <a href="decifra.php">
                                <script>setTimeout(7000);</script>

                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" />
                                </svg>
                            </a>
                        </div>
                        <div class="testoCifrato">
                            <h1>TESTO CIFRATO</h1>
                                <!-- visualizzazione testo cifrato -->
                            <textarea type="text" name="useless" placeholder="visualizzazione testo cifrato" style="color:white;font-size: 18px;" id="myInput" class="testoPadding"><?php 
                                if(isset($_POST["critta"]))
                                    {echo $cifrato;}else{} 
                            ?></textarea><br>
                            <button type="button" class="copy-text" onclick="myFunction()">  
                                Copia il Testo
                            </button> 
                        </div>
                    </div>
                </div>                 
                <div class="testoApparizione">
                    <?php describe();?>
                </div>
                <div class="invia">
                        <!-- submit del programma -->
                    <input type='submit' value='Cifra'>
                    <p><span id="demo"></span></p>
                </div>
            </form>
        <script type="text/javascript">
            //salva la selezione precedente
            document.getElementById('cryptmode').value = "<?php echo $_POST['cryptmode'];?>";
            document.getElementById('RSAmode').value = "<?php echo $_POST['RSAmode'];?>";
            document.getElementById('SYMmode').value = "<?php echo $_POST['SYMmode'];?>";
        </script>
        <script>
            (function onaction() {
            var d=document;
            var s1=d.getElementById('RSAmode');
            var s2=d.getElementById('SYMmode');
            var lo=d.getElementById('cryptmode')
            var temp;
            s1.className='hide';
            s2.className='hide';

            lo.onmousemove=function (){
            if(this.value==='1') s1.className=s1.className.replace('hide','');
            else {temp=this.value; s1.className='hide'; lo.value=temp;}
            if(this.value=== '2'||this.value=== '3'||this.value=== '8'||this.value=== '9') s2.className=s2.className.replace('hide','');
            else {temp=this.value; s2.className='hide'; lo.value=temp;}
            };
            lo.onchange=function (){
            if(this.value==='1')s1.className=s1.className.replace('hide','');
            else {temp=this.value; s1.className='hide'; lo.value=temp;}
            if(this.value=== '2'||this.value=== '3'||this.value=== '8'||this.value=== '9') s2.className=s2.className.replace('hide','');
            else {temp=this.value; s2.className='hide'; lo.value=temp;}
            };
            }());
        </script>

        <!-- <div class='spinner-wrapper'>
            <div class="spinner"></div>
        </div>
        
        <div class="main-content"></div>

        <script>
            let spinnerWrapper = document.querySelector('.spinner-wrapper');
        
            window.addEventListener('load', function () {
                spinnerWrapper.parentElement.removeChild(spinnerWrapper); 
            });
        </script>   -->

        <svg class="arrows">
			<path class="a1" d="M0 0 L30 32 L60 0"></path>
			<path class="a2" d="M0 20 L30 52 L60 20"></path>
			<path class="a3" d="M0 40 L30 72 L60 40"></path>
		</svg>
    </body>
</html>