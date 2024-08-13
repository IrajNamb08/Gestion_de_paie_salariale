<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bulletin de Paie</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #fff;
            color: #000;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            box-sizing: border-box;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header h1 {
            margin: 0;
            font-size: 18px;
        }
        .header p {
            margin: 0;
            font-size: 14px;
        }
        .company-info, .employee-info {
            display: inline-block;
            width: 48%;
            vertical-align: top;
            font-size: 12px;
        }
        .company-info {
            text-align: left;
        }
        .employee-info {
            text-align: right;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            font-size: 12px;
        }
        th, td {
            border: 1px solid #000;
            padding: 4px;
            text-align: center;
        }
        th {
            background-color: #f4f4f4;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Bulletin de</h1>
            <strong>Mois de {{$mois}}</strong>
        </div>
        <div class="company-info">
            <p><strong>Société</strong></p>
            <p>NIF : 6 008 546 321<br>
            Activité : Vente et location de voitures<br>
            CNAPS : 2019 Z 04003<br>
            Date paiement : 31/01/2021<br>
            Mode Paiement : Virement</p>
        </div>
        <div class="employee-info">
            <p>Mr/Mdme {{$bulletin->employer->nom}} {{$bulletin->employer->prenom}} <br>
            {{$bulletin->employer->adresse}}
            </p>
            <p>Matricule : {{$bulletin->employer->matricule}}<br>
            CNaPS : {{$bulletin->employer->numCnaps}}<br>
            Embaûche : {{$bulletin->employer->dateEmbauche}}<br>
            Ancienneté : 7 mois<br>
            Type de contrat : {{$bulletin->employer->dateEmbauche}}<br>
            </p>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Rubriques</th>
                    <th>Taux</th>
                    <th>Base</th>
                    <th>Gains</th>
                    <th>Retenues</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Salaire de base</td>
                    <td></td>
                    <td></td>
                    <td>{{number_format($bulletin->employer->salaire,2)}} Ar</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Salaire brut</td>
                    <td></td>
                    <td></td>
                    <td>{{number_format($bulletin->employer->salaire,2)}} Ar</td>
                    <td></td>
                </tr>
                <tr>
                    <td>CNAPS</td>
                    <td>0.01</td>
                    <td>{{number_format($bulletin->employer->salaire,2)}} Ar</td>
                    <td></td>
                    <td>{{ number_format($cnaps, 2) }} Ar</td>
                </tr>
                <tr>
                    <td>OSTIE</td>
                    <td>0.01</td>
                    <td>{{number_format($bulletin->employer->salaire,2)}} Ar<</td>
                    <td></td>
                    <td>{{ number_format($ostie, 2) }} Ar</td>
                </tr>
                <tr>
                    <td>IRSA</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>{{ number_format($irsa, 2) }} Ar</td>
                </tr>
                <tr>
                    <td>Salaire Net</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Net à payer</td>
                    <td></td>
                    <td></td>
                    <td>{{number_format($bulletin->salaire_net,2)}} Ar</td>
                    <td></td>
                </tr>
            </tbody>
        </table>
        <table>
            <thead>
                <tr>
                    <th>Salaire Brut</th>
                    <th>Salaire Net</th>
                    <th>IRSA</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{number_format($bulletin->employer->salaire,2)}} Ar<</td>
                    <td>{{number_format($bulletin->salaire_net,2)}} Ar</td>
                    <td>{{ number_format($irsa, 2) }} Ar</td>
                </tr>
            </tbody>
        </table>
        <div class="footer">
            <p>L'employeur :</p>
            <p>Monsieur RANDRIAMANANA Panja<br>Directeur Général</p>
        </div>
    </div>
</body>
</html>
