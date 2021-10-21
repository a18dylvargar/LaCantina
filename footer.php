<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>

        #imp{
            flex-wrap: wrap;
            display: flex;
            background-color: blueviolet;
            justify-content: center;

        }
        #one{
            background-color: green;
            word-wrap: break-word;
            width: 200px;
            height: 200px;
        }
        #dos{
            flex-direction: column
        }
        #tres{
            background-color: yellow;
            width: 200px;
            height: 50px;

        }
        #divimg{
            background-color: deepskyblue;
            height: 200px;
            width: 200px;


        }

    </style>
</head>
<body>
<div id="imp">
    <div id="dos">
        <div id="tres"><h1>Centre</h1></div>
        <div id='one'>Institut públic (08076391) del districte de Les Corts, amb oferta d'ESO, Batxillerat, CF d'Informàtica, i d'Imatge i so, i PFI (Programes de formació i inserció).</div>
    </div>

    <div id="dos">
        <div  id="tres"><h1>Legal</h1></div>
        <div id='one'>

            Cookies

            Avís legal

            Protecció de dades
        </div>

    </div>

    <div id="dos">
        <div  id="tres"><h1>Contacte</h1></div>
        <div id='one'>
            93 203 33 32

            93 203 36 42

            93 203 83 86

            inspedralbes@xtec.cat

            Web AFA
        </div>
    </div>

    <div id="dos">
        <div  id="tres"><h1>Adreça</h1></div>

            <div id="divimg">
                    <img src="/img/mapa.PNG">
            </div>
        </div>
    </div>
</div>
</body>
</html>