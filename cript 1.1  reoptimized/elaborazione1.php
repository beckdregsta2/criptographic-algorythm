<?php
$AES = false;
$tmp = 0;
    //gestione dei form
if (isset($_POST['cryptmode']))
    $mode = $_POST['cryptmode'];
else{$mode = 0;$tmp = 1;}
if (isset($_POST['decryptmode']))
    $mode = $_POST['decryptmode'];
else
    if ($tmp == 1){$mode = 0;$tmp = 0;}
    //algoritmi di crittografia Asimmetrici

//RSA propietario
if($mode == '0')
    $rsa_propietario = true;
else
    $rsa_propietario = false;
//RSA librerie
if($mode == '1')
    $rsa_librerie = true;
else
    $rsa_librerie = false;

    //algoritmi di crittografia simmetrici
//AES
if($mode == '2')
$AES = true;
else
    $AES = false;

//RIJ
if($mode == '3')
    $RIJ = true;
else
    $RIJ = false;
//TWF
if($mode == '4')
    $TWF = true;
else
    $TWF = false;
//BLF
if($mode == '5')
    $BLF = true;
else
    $BLF = false;
//RC4
if($mode == '6')
    $RC4 = true;
else
    $RC4 = false;
//RC2
if($mode == '7')
    $RC2 = true;
else
    $RC2 = false;
//3DES
if($mode == '8')
    $DES3 = true;
else
    $DES3 = false;
//3DES
if($mode == '9')
    $DES = true;
else
    $DES = false;


    // selezione metodo di cifratura
if (isset($_POST['RSAmode']))
    $RSAmode = $_POST['RSAmode'];
else{$RSAmode = 'PKCS1';}

if (isset($_POST['SYMmode']))
    $SYMmode = $_POST['SYMmode'];
else{$SYMmode = 'CBC';}




    //descrizione algoritmi
function describe()
{
    global $rsa_librerie,$rsa_propietario,$AES,$RC2,$RC4,$RIJ,$p,$q,$n,$phi,$e,$d,$cifrato,$plaintext,$TWF,$BLF,$DES,$DES3;
    if($rsa_propietario == true && empty($_POST["critta"])!= false )
    {echo "
     <div class='spazioBianco'></div>
         <div class='informazioniAlgoritmi'>
             <div class='descrizioneAlgoritmo'>
                 <h1>RSA creato da noi</h1>
                 <p>
                     RSA è un algoritmo a chiave asimmetrica inventato nel 1977 da scienziati del MIT, che permette la creazione
                     di due chiavi tramite una funzione facile da computare ma difficile da invertire a meno che non si conosca la sua chiave.
                     La sicurezza di RSA si basa sul fatto che l'esponente modulare n sia una funzione difficilmente invertibile all'aumentare 
                     della sua grandezza e quindi usando numeri p,q sufficientemente grandi ( tipicamente 1024bit) la sicurezza è estremamente alta
                     con le tecnologie attuali.   
                 </p>
             </div>
 
             <div class='procedimento'>
                 <h1>PROCEDIMENTO</h1>
                 <p>
                     Per l'effettiva implementazione del linguaggio è necessario inanzitutto creare entrambe le chiavi<br>                     
                     -si scelgono due numeri primi p e q tipicamente molto grandi<br>                      
                     -successivamente si calcola n, moltiplicando p per q<br>                   
                     -si calcola 𐌘(phi) con la formula (p-1)*(q-1)<br>                   
                     -si sceglie l'esponente pubblico e, coprimo e più piccolo di 𐌘(phi) <br>             
                     -si calcola l'esponente privato d con il metodo di eculide esteso o l'incremento<br><br>                               
                     A questo punto si procede con la cifratura del messaggio<br>   
                     -cifrato = messaggio^e mod n<br>
                     -messaggio = cifrato^d mod n<br>
                 </p>
             </div>
         </div>";}
 if($rsa_propietario == true && empty($_POST["critta"])!= true )
     {echo "
     <div class='spazioBianco'></div>
         <div class='informazioniAlgoritmi'>
             <div class='descrizioneAlgoritmo'>
                 <h1>RSA creato da noi</h1>
                 <p>
                 redddrreddd
                     RSA è un algoritmo a chiave asimmetrica inventato nel 1977 da scienziati del MIT, che permette la creazione
                     di due chiavi tramite una funzione facile da computare ma difficile da invertire a meno che non si conosca la sua chiave.
                     La sicurezza di RSA si basa sul fatto che l'esponente modulare n sia una funzione difficilmente invertibile all'aumentare 
                     della sua grandezza e quindi usando numeri p,q sufficientemente grandi ( tipicamente 1024bit) la sicurezza è estremamente alta
                     con le tecnologie attuali.   
                 </p>
             </div>     
             <div class='procedimento'>
                 <h1>PROCEDIMENTO</h1>
                 <p>
                     Per l'effettiva implementazione del linguaggio è necessario inanzitutto creare entrambe le chiavi<br>                        
                     -si scelgono due numeri primi p e q tipicamente molto grandi, in questo caso |p=$p q=$q|<br>                      
                     -successivamente si calcola n, moltiplicando p e q |$n=$p*$q|<br>                       
                     -i calcola 𐌘(phi) con la formula (p-1)*(q-1) |$phi=($p-1)*($q-1)|<br>                   
                     -si sceglie l'esponente pubblico e, coprimo e più piccolo di 𐌘(phi) |$e|<br>             
                     -si calcola l'esponente privato d in questo caso con il metodo di eculide esteso |$d|<br><br>                                  
                     A questo punto si procede con la cifratura del messaggio<br>     
                     -cifrato = messaggio^e mod n |messagio cifrato≡$plaintext^$e mod $n|<br>
                 </p>
             </div>   
         </div>";}
 if($rsa_librerie == true && empty($_POST["critta"])!= true )
    {echo "
    <div class='spazioBianco'></div>
    <div class='informazioniAlgoritmi'>
        <div class='descrizioneAlgoritmo'>
            <h1>RSA creato da noi</h1>
            <p>
                 librerie
                RSA è un algoritmo a chiave asimmetrica inventato nel 1977 da scienziati del MIT, che permette la creazione
                di due chiavi tramite una funzione facile da computare ma difficile da invertire a meno che non si conosca la sua chiave.
                La sicurezza di RSA si basa sul fatto che l'esponente modulare n sia una funzione difficilmente invertibile all'aumentare 
                della sua grandezza e quindi usando numeri p,q sufficientemente grandi ( tipicamente 1024bit) la sicurezza è estremamente alta
                con le tecnologie attuali.   
            </p>
        </div>     
        <div class='procedimento'>
            <h1>PROCEDIMENTO</h1>
            <p>
                Per l'effettiva implementazione del linguaggio è necessario inanzitutto creare entrambe le chiavi<br>                        
                -si scelgono due numeri primi p e q  molto grandi<br>                      
                -successivamente si calcola n, moltiplicando p e q<br>                       
                -si calcola 𐌘(phi) con la formula (p-1)*(q-1)<br>                   
                -si sceglie l'esponente pubblico e, coprimo e più piccolo di 𐌘(phi)<br>             
                -si calcola l'esponente privato d in questo caso con il metodo di eculide esteso (d*e mod 𐌘 ≡ 1)<br>                              
                 
                In tal modo vengono generate le chiavi<br>
                 <input type='text' name='useless' id='cryptkeyAppear' value='".file_get_contents('pub.txt')."' style='width:240px;'></input><br>


                A questo punto si procede con la cifratura del messaggio<br>     
                -cifrato = messaggio^e mod n <br>
            </p>
        </div>
        <div class='procedimento'>
            <h1>IN PARTICOLARE</h1>
            <p>
                Per quanto riguarda la modalità di cifratura interna usata da RSA per la generazione delle chiavi si possono distinguere due tipi largamente usati<br><br>
                -PKCS#1 (Public Key Cryptographic Standards) fu il primo e definì gli standard per la generazione delle chiavi
                <a href='https://en.wikipedia.org/wiki/PKCS_1'> PCKS 1</a>)<br>
                -OEAP   (Optimal Asymmetric Encryption Padding) fu implementato successivamente per prevenire un decrittamento parziale del messaggio
                <a href='https://en.wikipedia.org/wiki/Optimal_asymmetric_encryption_padding'> OAEP</a>)<br>
            </p>
        </div>    
    </div>";}
 if($AES == true && empty($_POST["critta"])!= true)
    {
     var_dump($AES);
        echo "
         <div class='spazioBianco'></div>
         <div class='informazioniAlgoritmi'>
             <div class='descrizioneAlgoritmo'>
                 <h1>AES</h1>
                 <p>
                     librerie AES
                     AES (Advanced Encryption Standard) è uno standard di cifratura a chiave simmetrica adottato dalla 
                     <a href='https://it.wikipedia.org/wiki/National_Institute_of_Standards_and_Technology'>NIST</a>
                     dopo vari anni di studi e selezione tra vari algiritmi proposti venne scelto Rijndael.<br>
                     I criteri per cui è stato scelto sono la sua capacità di poter essere impiegato in un ampia gamma di applicazioni,
                     uso di risorse elaborative minime, semplice, veloce, sicuro e multiplatform.<br><br>

                     AES è un cifrario a blocchi di lunghezza fissa a 128 bits con chiavi che variano da 128, 192, 256 bits<br>
                     (si differenzia da Rijndael perchè quest'ultimo usa chiavi a multipli di 32 con minimo 128 max 256, 
                     <a href='https://csrc.nist.gov/csrc/media/projects/cryptographic-standards-and-guidelines/documents/aes-development/rijndael-ammended.pdf'> qui</a>)la lista dei cambiamenti

                 </p>
             </div>     
             <div class='procedimento'>
                 <h1>PROCEDIMENTO</h1>
                 <p>
                 Le operazioni eseguite da AES consistono in una serie di permutazioni spostamenti e sostituzioni<br><br>

                 La prima fase AddRaundKey consiste nella creazione di una matrice 4x4 di 128 bits e da qui si procede con la cifratura<br>
                 -SubBytes in cui si sostituiscono in maniera non lineare tutti i byte della tabella<br>
                 -ShiftRows in cui si spostano le caselle di un certo numero di posizioni seguendo le righe<br>
                 -MixColumns combinazione delle righe in maniera lineare<br>
                 -AddRoundKey in cui ogni byte della tabella viene combinato dalla chiave di sessione generata <br><br>
                 Tutte queste operazioni vengono effettuate per 10 cicli<br>
                 (cifratura e decifratura si differenziano dall'ordine di esecuzione inverso)
                 </p>
             </div>   
             <div class='procedimento'>
                <h1>IN PARTICOLARE</h1>
                <p>
                    Per quanto riguarda la modalità di cifratura interna usata da AES si possono trovare 5 tipi<br><br>
                    -ECB mode: Electronic Code Book (la più semplice di tutte e molto debole)<br>
                    -CBC mode: Cipher Block Chaining (introduce un vettore IV genrato casualmente per aumentare la sicurezza)<br>
                    -CFB mode: Cipher FeedBack (permette il calcolo parallelo)<br>
                    -OFB mode: Output FeedBack (non necessita di padding quindi migliore sicurezza)<br>
                    -CTR mode: Counter (il vettore IV viene usato come contatore)<br>
                    <img src='images\Modes_of_operation.png'><br>
                    <a href='https://www.highgo.ca/2019/08/08/the-difference-in-five-modes-in-the-aes-encryption-algorithm/'>difference-of-five-modes</a>
                </p>
            </div>   
         </div>";
     }
 if($RIJ == true && empty($_POST["critta"])!= true )
    {
        var_dump($RIJ);
        echo "
     <div class='spazioBianco'></div>
     <div class='informazioniAlgoritmi'>
         <div class='descrizioneAlgoritmo'>
             <h1>Rijendhael</h1>
             <p>
             Rijindael (combinazione dai nomi dei creatori) è un algoritmo di cifratura a chiave simmetrica adottato da
             <a href='https://it.wikipedia.org/wiki/National_Institute_of_Standards_and_Technology'>NIST</a>
             e usato per AES dopo vari anni di studi e selezione tra vari algiritmi proposti.
             I criteri per cui è stato scelto sono la sua capacità di poter essere impiegato in un ampia gamma di applicazioni,
             uso di risorse elaborative minime, semplice, veloce, sicuro e multiplatform.<br><br>  
             
             
             Rijindael è un cifrario a blocchi di lunghezza variabile che usa chiavi a multipli di 32 con minimo 128 max 256 bits<br>
             (si differenzia da AES per via che quest'ultimo utilizza lunghezza fissa a 128 con chiavi che variano da 128, 192, 256 bits 
             <a href='https://csrc.nist.gov/csrc/media/projects/cryptographic-standards-and-guidelines/documents/aes-development/rijndael-ammended.pdf'> qui</a>)la lista dei cambiamenti

             </p>
         </div>     
         <div class='procedimento'>
             <h1>FUNZIONAMENTO</h1>
             <p>
             Le operazioni eseguite da Rijhindael consistono in una serie di permutazioni spostamenti e sostituzioni<br><br>

             La prima fase AddRaundKey consiste nella creazione di una matrice 4x4 di 128 bits e da qui si procede con la cifratura<br>
             -ByteSub in cui si sostituiscono in maniera non lineare tutti i byte della tabella<br>
             -ShiftRow in cui si spostano le caselle di un certo numero di posizioni seguendo le righe<br>
             -MixColumn combinazione delle righe in maniera lineare<br>
             -AddRoundKey in cui ogni byte della tabella viene combinato dalla chiave di sessione generata<br>
             Tutte queste operazioni vengono effettuate per 10 cicli<br>
             (cifratura e decifratura si differenziano per'ordine di esecuzione inverso)
             </p>
         </div>  
         <div class='procedimento'>
         <h1>IN PARTICOLARE</h1>
         <p>
             Per quanto riguarda la modalità di cifratura interna usata da Rijhindael si possono trovare 5 tipi<br><br>
             -ECB mode: Electronic Code Book (la più semplice di tutte e molto debole)<br>
             -CBC mode: Cipher Block Chaining (introduce un vettore IV genrato casualmente per aumentare la sicurezza)<br>
             -CFB mode: Cipher FeedBack (permette il calcolo parallelo)<br>
             -OFB mode: Output FeedBack (non necessita di padding quindi migliore sicurezza)<br>
             -CTR mode: Counter (il vettore IV viene usato come contatore)<br>
             <img src='images\Modes_of_operation.png'><br>
             <a href='https://www.highgo.ca/2019/08/08/the-difference-in-five-modes-in-the-aes-encryption-algorithm/'>difference-of-five-modes</a>
         </p>
     </div>   
     </div>";
      }
 if($TWF == true && empty($_POST["critta"])!= true )
    {echo "
    <div class='spazioBianco'></div>
    <div class='informazioniAlgoritmi'>
        <div class='descrizioneAlgoritmo'>
            <h1>TwoFish</h1>
            <p>
            TwoFish è un algoritmo di cifratura a chiave simmetrica privo di brevetto ideato da Bruce Schineier e versione aggiornata di BlowFish,<br>
            è stato candidato come semifinalista per AES, con cui ha pressocchè pari velocità, inoltre non si conoscono metodi di attacco
            se non il bruteforce, sancendone la sua invulnerabilità odierna<br><br>

            Twofish è un cifrario a blocchi + e una chiave di lunghezza da 128 a 256 bits ottimizzato per cpu a 32 bit 
            </p>
        </div>     
        <div class='procedimento'>
            <h1>FUNZIONAMENTO</h1>
            <p>
            il suo funzionamento prevede la stessa struttura di Faistel come DES reiterata per 16 cicli dando in ingresso blocchi di 
            128 bit e successivamente effettuandone la cifratura con la funzione bettiva F
            (cifratura e decifratura si differenziano per'ordine di esecuzione inverso)
            </p>
        </div>   
    </div>";}
 if($BLF == true && empty($_POST["critta"])!= true )
    {echo "
    <div class='spazioBianco'></div>
    <div class='informazioniAlgoritmi'>
        <div class='descrizioneAlgoritmo'>
            <h1>BlowFish</h1>
            <p>
            BlowFish è un algoritmo di cifratura a chiave simmetrica ideato nel 1993 da Bruce Schineier, un famoso esperto di crittografia<br>
            nato per soppiantare DES e libero da qualsiasi brevetto.<br>
            I lati positivi di questo algoritmo sono il suo essere elaborativamente leggero ed essere sicuro contro attacchi di bruteforce,<br>
            tuttavia le operazioni eseguite impiegano molto tempo per essere eseguite.
            </p>
        </div>     
        <div class='procedimento'>
            <h1>FUNZIONAMENTO</h1>
            <p>
             BlowFish è un cifrario a blocchi e utilizza una chiave di lunghezza tra 32 e 448 bits

             Il suo funzionamento prevede che la divisione dei dati in due categorie, che suddivise a loro volta 
             formeranno 5 array che verranno elaborati a loro volta per un numero di cicli per poi essere sostituiti 
             con gli originali e ricombinati in un unica parte
             (cifratura e decifratura si differenziano per'ordine di esecuzione inverso)
            </p>
        </div>   
    </div>
    ";}
 if($DES == true && empty($_POST["critta"])!= true )
    {echo "
    <div class='spazioBianco'></div>
    <div class='informazioniAlgoritmi'>
        <div class='descrizioneAlgoritmo'>
            <h1>DES</h1>
            <p>
            DES (Data Encryption Standard) è un algoritmo di cifratura a chiave simmetrica ideato nel 1976 per IBM,<br> 
            è il precursore dei moderni algoritmi e usato come standard dagli USA, ma ormai deprecato per via della sua chiave<br>
            di soli 56 bit valicabile in poche ore.
            </p>
        </div>     
        <div class='procedimento'>
            <h1>FUNZIONAMENTO</h1>
            <p>
            DES è un cifrario a blocchi di lunghezza fissa a 64 bits con chiave da 64 di cui 8 di controllo<br><br>

            Il suo funzionamento prevede che al blocco di 64 bit venga trasposta la chiave che tramite la funzione di cifratura<br>
            viene ruotata di determinate posizioni per 16 cicli<br>
            (cifratura e decifratura si differenziano per'ordine di esecuzione inverso)<br>
            </p>
        </div>
        <div class='procedimento'>
        <h1>IN PARTICOLARE</h1>
        <p>
            Per quanto riguarda la modalità di cifratura interna usata da DES si possono trovare 5 tipi<br><br>
            -ECB mode: Electronic Code Book (la più semplice di tutte e molto debole)<br>
            -CBC mode: Cipher Block Chaining (introduce un vettore IV genrato casualmente per aumentare la sicurezza)<br>
            -CFB mode: Cipher FeedBack (permette il calcolo parallelo)<br>
            -OFB mode: Output FeedBack (non necessita di padding quindi migliore sicurezza)<br>
            -CTR mode: Counter (il vettore IV viene usato come contatore)<br>
            <img src='images\Modes_of_operation.png'><br>
            <a href='https://www.highgo.ca/2019/08/08/the-difference-in-five-modes-in-the-aes-encryption-algorithm/'>difference-of-five-modes</a> ////
            <a href='https://csrc.nist.gov/csrc/media/publications/fips/81/archive/1980-12-02/documents/fips81.pdf'>DES documentation</a>
        </p>
    </div>     
    </div>
    ";}
 if($DES3 == true && empty($_POST["critta"])!= true )
    {echo "
    <div class='spazioBianco'></div>
    <div class='informazioniAlgoritmi'>
        <div class='descrizioneAlgoritmo'>
            <h1>Triple-DES</h1>
            <p>
            Triple-DES (Triple-Data Encryption Standard) è un algoritmo di cifratura a chiave asimmetrica ideato per soppiantare DES nel 1999<br>
             la differenza consiste nell'effettuare la cifratura DES 3 volte consecutive con 3 chiavi offrendo possibilità di scelta:<br>
             -le tre chiavi sono tutte diverse<br>
             -due chiavi sono identiche e la terza distinta<br>
             -le tre chiavi sono tutte uguali<br>
            </p>
        </div>     
        <div class='procedimento'>
            <h1>FUNZIONAMENTO</h1>
            <p>
            Il suo funzionamento prevede che il testo venga prima cifrato con la prima chiave decifrato con la seconda e cifrato con la terza(EDE)<br>
            per un totale di 48 cicli<br>
            (cifratura e decifratura si differenziano per'ordine di esecuzione inverso)
            </p>
        </div>
        <div class='procedimento'>
        <h1>IN PARTICOLARE</h1>
        <p>
            Per quanto riguarda la modalità di cifratura interna usata da Triple-DES si possono trovare 5 tipi<br><br>
            -ECB mode: Electronic Code Book (la più semplice di tutte e molto debole)<br>
            -CBC mode: Cipher Block Chaining (introduce un vettore IV genrato casualmente per aumentare la sicurezza)<br>
            -CFB mode: Cipher FeedBack (permette il calcolo parallelo)<br>
            -OFB mode: Output FeedBack (non necessita di padding quindi migliore sicurezza)<br>
            -CTR mode: Counter (il vettore IV viene usato come contatore)<br>
            <img src='images\Modes_of_operation.png'><br>
            <a href='https://www.highgo.ca/2019/08/08/the-difference-in-five-modes-in-the-aes-encryption-algorithm/'>difference-of-five-modes</a> ////
            <a href='https://csrc.nist.gov/csrc/media/publications/fips/81/archive/1980-12-02/documents/fips81.pdf'>DES documentation</a>
        </p>
    </div>     
    </div>
    ";}
}
?>