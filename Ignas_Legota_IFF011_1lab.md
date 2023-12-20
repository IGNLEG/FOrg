![](Aspose.Words.2ef9e73c-3e45-48f3-b898-4ecd4437b9e6.001.png)

**Kauno technologijos universitetas**

Informatikos fakultetas

**T120B165 Saityno taikomųjų programų projektavimas**

Projekto „FOrg“ ataskaita

|||
| :- | :- |
|<p>**Ignas Legota, IFF-0/11**</p><p>Studentas</p>||
|||
|<p>**Dėst.val. Baltulionis Simonas**</p><p>Dėstytojas</p><p>**Dėst.val. Lukošius Tomas**</p><p>Dėstytojas</p>||
|||


![](Aspose.Words.2ef9e73c-3e45-48f3-b898-4ecd4437b9e6.002.png)

**Turinys**
#
[1.	Sprendžiamo uždavinio aprašymas	3](#_toc146543750)

[1.1.	Sistemos paskirtis	3](#_toc146543751)

[1.2.	Funkciniai reikalavimai	3](#_toc146543752)

[2.	Sistemos architektūra	5](#_toc146543753)




















<a name="_toc503646966"></a><a name="_toc503648356"></a><a name="_toc503651300"></a><a name="_toc505346876"></a>
1. # <a name="_toc146543750"></a>**Sprendžiamo uždavinio aprašymas**
   1. ## <a name="_toc146543751"></a>**Sistemos paskirtis**
Sistemos „FOrg“ tikslas yra palengvinti įmonės sutarčiu, sąskaitų ir apmokėjimų, bei rekvizitų valdymą.

Kuriama sistema bus padalinta į dvi dalis – internetinę aplikaciją (angl. „web app“) ir serverinę dalį. Serverinę dalį sudarys REST principu sukurta aplikacijų programavimo sąsaja (angl. „API“), bei duomenų bazė.

1. ## <a name="_toc146543752"></a>**Funkciniai reikalavimai**
Sistemoje vyraus 3 rolės – user, super-user ir admin. User rolę turintys naudotojai turės bazines, jiems skirtas teises, kurias administratorius galės papildyti arba atimti pagal poreikį. Naudotojai sistemoje negalės atlikti tam tikrų veiksmų, jeigu neturės jiems reikalingos rolės, nors ir turės priskirtą teisę (pvz. paprastas user negalės keisti įrašų informacijos ir galės matyti tik jo pačio sukurtus įrašus). Super-user rolę turintys naudotojai papildomai galės matyti visus įrašus. Administratorius turės pilną prieigą prie sistemos ir šią rolę bus galima priskirti tik pakeitus pačioje duomenų bazėje esamus duomenis – kitaip sakant, administratorius galės užregistruoti tik sistemą palaikantis programuotojas. Kitų rolių vartotojus galės užregistruoti administratorius.

Neprisijungęs naudotojas galės atlikti šiuos veiksmus:

- Prisijungti prie sistemos.
- Prisiregistruoti prie sistemos.

Prisijungęs (registruotas) naudotojas galės atlikti šiuos veiksmus:

- Atsijungti nuo sistemos.
- Naviguoti per puslapius.

Toliau pateikiami prisijungusių naudotojų galimi veiksmai, pagal roles:

- User:
  - Peržiūrėti savo kurtus įrašus.
  - Kurti naujus įrašus.
- Super-user:
  - Peržiūrėti visus įrašus.
  - Kurti naujus įrašus.
- Administratorius galės viską, ką gali kitos rolės, papildomai:
  - Keisti įrašų informaciją.
  - Trinti įrašus.
1. # <a name="_toc146543753"></a>**Sistemos architektūra**
Sistemą sudarys dvi dalys:

- Klientinė dalis – sukurta naudojant Vue.js, Vuetify ir Nuxt3 karkasą.
- Serverinė dalis – sukurta naudojant PHP Laravel karkasą su MySQL reliacine duomenų baze. 


![](Aspose.Words.2ef9e73c-3e45-48f3-b898-4ecd4437b9e6.003.png)Sistemą sudarančios dalys yra patalpintos viename Azure serveryje. Klientinė ir serverinės dalys bendrauja naudojant HTTP, per 8080 prievadą. Naudotojas gali kreiptis tik į klientinę dalį, naudojant HTTP per 80 prievadą. Serverinė dalis yra vienintelė turinti prieigą prie duomenų bazės, su kuria bendrauja naudojant MYSQL protokolą, per 3306 prievadą.

![Paveikslėlis, kuriame yra tekstas, ekrano kopija, diagrama, Šriftas

Automatiškai sugeneruotas aprašymas](Aspose.Words.2ef9e73c-3e45-48f3-b898-4ecd4437b9e6.004.png)
1. # **REST API specifikacija**
Šioje dalyje yra aprašyti serverinės dalies galimi metodai ir informacija apie juos. Rašymo metu, serverinė dalis yra pasiekiama adresu <http://159.89.16.213/api>, tačiau ateityje gali skirtis, todėl API metodų aprašymuose pats domenas nebus rašomas. 

Taip pat, visiems „endpoint“ informacija yra siunčiama JSON formatu, kaip ir iš jų grąžinama informacija.

1. ## **User „endpoint“**
lentelė 1. POST /api/register route specifikacija

|HTTP Metodas|POST /api/register|
| - | - |
|Paskirtis|Užsiregistruoti|
|Užklausos antraštės (headers)|<p>--header 'Accept: application/json' </p><p>--header 'Content-Type: application/json' </p><p></p>|
|Užklausos parametrai (body)|<p>{</p><p>`  `"name": "string",</p><p>`  `"email": "user@example.com",</p><p>`  `"password": "string",</p><p>`  `"confirm\_password": "string"</p><p>}</p><p></p>|
|Atsakymo struktūra|<p>{</p><p>`    `"token": "string",</p><p>`    `"name": "string",</p><p>`    `"roles": [</p><p>`        `"string"</p><p>`    `]</p><p>}</p>|
|Galimi atsako kodai|<p>200 OK, grąžinamas access token, nautotojo vardas ir jo rolės.</p><p>202 Accepted, grąžinamas error (Unautorized Access).</p>|

lentelė 2. POST /api/login route specifikacija

|HTTP Metodas|POST /api/login|
| - | - |
|Paskirtis|Prisijungti prie sistemos|
|Užklausos antraštės (headers)|<p>`  `--header 'Accept: application/json' </p><p>`  `--header 'Content-Type: application/json' </p><p></p>|
|Užklausos parametrai (body)|<p>{</p><p>`  `"email": "user@example.com",</p><p>`  `"password": "string"</p><p>}</p><p></p>|
|Atsakymo struktūra|<p>{</p><p>`    `"token": "string",</p><p>`    `"name": "string",</p><p>`    `"roles": [</p><p>`        `"string"</p><p>`    `]</p><p>}</p>|
|Galimi atsako kodai|<p>200 OK, grąžinamas access token, nautotojo vardas ir jo rolės.</p><p>202 Accepted, grąžinamas error (Unautorized Access).</p>|


lentelė 3. POST /api/logout route specifikacija

|HTTP Metodas|POST /api/logout|
| - | - |
|Paskirtis|Atsijungti nuo sistemos|
|Užklausos antraštės (headers)|<p>--header 'Accept: application/json' </p><p>--header 'Content-Type: application/json' </p><p>--'Authorization: Bearer {access-token}'</p>|
|Užklausos parametrai (body)|-|
|Atsakymo struktūra|<p>{</p><p>`  `"message": "successfully logged out"</p><p>}</p>|
|Galimi atsako kodai|<p>200 OK</p><p>401 Unauthorized, message: Unauthenticated</p>|



1. ## **Requisite „endpoint“**

lentelė 4. GET /api/requisites route specifikacija

|HTTP Metodas|GET /api/requisites|
| - | - |
|Paskirtis|Gauti visų rekvizitų sąrašą.|
|Užklausos antraštės (headers)|<p>--header 'Accept: application/json' </p><p>--header 'Content-Type: application/json' </p><p>--'Authorization: Bearer {access-token}'</p>|
|Užklausos parametrai (body)|-|
|Atsakymo struktūra|<p>[{</p><p>`  `"id": "int",</p><p>`  `"name": "string",</p><p>`  `"code": "string",</p><p>`  `"tax\_id": "string",</p><p>`  `"address": "string",</p><p>`  `"bank\_account": "string",</p><p>`  `"creation\_date": "string"</p><p>}…]</p>|
|Galimi atsako kodai|<p>200 OK,</p><p>401 Unauthorized,</p><p></p><p>404 Not Found (message)</p>|

lentelė 5. GET /api/requisites/{id} route specifikacija

|HTTP Metodas|GET /api/requisites/{id}|
| - | - |
|Paskirtis|Gauti vieną rekvizitą, pagal ID|
|Užklausos antraštės (headers)|<p>--header 'Accept: application/json' </p><p>--header 'Content-Type: application/json' </p><p>--'Authorization: Bearer {access-token}'</p>|
|Užklausos parametrai (body)|-|
|Atsakymo struktūra|<p>{</p><p>`  `"id": "int",</p><p>`  `"name": "string",</p><p>`  `"code": "string",</p><p>`  `"tax\_id": "string",</p><p>`  `"address": "string",</p><p>`  `"bank\_account": "string",</p><p>`  `"creation\_date": "string"</p><p>}</p>|
|Galimi atsako kodai|<p>200 OK,</p><p>401 Unauthorized,</p><p>404 Not Found (message)</p>|

lentelė 6. POST /api/requisites route specifikacija

|HTTP Metodas|POST /api/requisites|
| - | - |
|Paskirtis|Sukurti naują rekvizito įrašą.|
|Užklausos antraštės (headers)|<p>--header 'Accept: application/json' </p><p>--header 'Content-Type: application/json' </p><p>--'Authorization: Bearer {access-token}'</p>|
|Užklausos parametrai (body)|<p>{</p><p>`  `"name": "string",</p><p>`  `"code": "string",</p><p>`  `"tax\_id": "string",</p><p>`  `"address": "string",</p><p>`  `"bank\_account": "string",</p><p>`  `"creation\_date": "string"</p><p>}</p>|
|Atsakymo struktūra|<p>{</p><p>`  `"id": "int",</p><p>`  `"name": "string",</p><p>`  `"code": "string",</p><p>`  `"tax\_id": "string",</p><p>`  `"address": "string",</p><p>`  `"bank\_account": "string",</p><p>`  `"creation\_date": "string"</p><p>}</p>|
|Galimi atsako kodai|<p>201 Created,</p><p>401 Unauthorized,</p><p>404 Not Found (message)</p>|

lentelė 7. PUT/PATCH /api/requisites/{id} route specifikacija

|HTTP Metodas|PUT/PATCH /api/requisites/{id}|
| - | - |
|Paskirtis|Atnaujinti rekvizitą.|
|Užklausos antraštės (headers)|<p>--header 'Accept: application/json' </p><p>--header 'Content-Type: application/json' </p><p>--'Authorization: Bearer {access-token}'</p>|
|Užklausos parametrai (body)|<p>{</p><p>`  `"name": "string",</p><p>`  `"code": "string",</p><p>`  `"tax\_id": "string",</p><p>`  `"address": "string",</p><p>`  `"bank\_account": "string",</p><p>`  `"creation\_date": "string"</p><p>}</p>|
|Atsakymo struktūra|<p>{</p><p>`  `"id": "int",</p><p>`  `"name": "string",</p><p>`  `"code": "string",</p><p>`  `"tax\_id": "string",</p><p>`  `"address": "string",</p><p>`  `"bank\_account": "string",</p><p>`  `"creation\_date": "string"</p><p>}</p>|
|Galimi atsako kodai|<p>200 OK,</p><p>404 Not Found (message),</p><p>422 Unprocessable Content (error message, error array)</p>|

lentelė 8. DELETE /api/requisites/{id} route specifikacija

|HTTP Metodas|DELETE /api/requisites/{id}|
| - | - |
|Paskirtis|Ištrinti rekvizitą.|
|Užklausos antraštės (headers)|<p>--header 'Accept: application/json' </p><p>--header 'Content-Type: application/json' </p><p>--'Authorization: Bearer {access-token}'</p>|
|Užklausos parametrai (body)|-|
|Atsakymo struktūra|<p>{</p><p>`  `"message": "Deleted successfully"</p><p>}</p>|
|Galimi atsako kodai|<p>200 OK,</p><p>404 Not Found (message)</p>|

1. ## **Contract „endpoint“**

lentelė 9. GET /api/contracts route specifikacija

|HTTP Metodas|GET /api/contracts|
| - | - |
|Paskirtis|Gauti visų kontraktų sąrašą.|
|Užklausos antraštės (headers)|<p>--header 'Accept: application/json' </p><p>--header 'Content-Type: application/json' </p><p>--'Authorization: Bearer {access-token}'</p>|
|Užklausos parametrai (body)|-|
|Atsakymo struktūra|<p>[{</p><p>`  `"id ": "int",</p><p>`  `"sign\_date": "string",</p><p>`  `"sign\_place": "string",</p><p>`  `"customer": "string",</p><p>`  `"signee": "string",</p><p>`  `"price": "string",</p><p>`  `"user\_id": "string",</p><p></p><p>`  `"tax": "string",</p><p>`  `"advance\_payment\_sum": "string"</p><p>`  `"created\_at": "string"</p><p></p><p>`  `"updated\_at": "string"</p><p>} …]</p>|
|Galimi atsako kodai|<p>200 OK,</p><p>401 Unauthorized,</p><p></p><p>404 Not Found (message)</p>|

lentelė 10. GET /api/contracts/{id} route specifikacija 

|HTTP Metodas|GET /api/contracts/{id}|
| - | - |
|Paskirtis|Gauti vieną kontraktą, pagal ID|
|Užklausos antraštės (headers)|<p>--header 'Accept: application/json' </p><p>--header 'Content-Type: application/json' </p><p>--'Authorization: Bearer {access-token}'</p>|
|Užklausos parametrai (body)|-|
|Atsakymo struktūra|<p>{</p><p>`  `"id ": "int",</p><p>`  `"sign\_date": "string",</p><p>`  `"sign\_place": "string",</p><p>`  `"customer": "string",</p><p>`  `"signee": "string",</p><p>`  `"price": "string",</p><p>`  `"user\_id": "string",</p><p>`  `"tax": "string",</p><p>`  `"advance\_payment\_sum": "string"</p><p>`  `"created\_at": "string"</p><p></p><p>`  `"updated\_at": "string"</p><p>}</p>|
|Galimi atsako kodai|<p>200 OK,</p><p>401 Unauthorized,</p><p>404 Not Found (message)</p>|

lentelė 11. POST /api/contracts route specifikacija

|HTTP Metodas|POST /api/contracts|
| - | - |
|Paskirtis|Sukurti naują kontrakto įrašą.|
|Užklausos antraštės (headers)|<p>--header 'Accept: application/json' </p><p>--header 'Content-Type: application/json' </p><p>--'Authorization: Bearer {access-token}'</p>|
|Užklausos parametrai (body)|<p>{</p><p>`  `"sign\_date": "string",</p><p>`  `"sign\_place": "string",</p><p>`  `"customer": "string",</p><p>`  `"signee": "string",</p><p>`  `"price": "string",</p><p>`  `"tax": "string",</p><p>`  `"advance\_payment\_sum": "string"</p><p>}</p>|
|Atsakymo struktūra|<p>{</p><p>`  `"id ": "int",</p><p>`  `"sign\_date": "string",</p><p>`  `"sign\_place": "string",</p><p>`  `"customer": "string",</p><p>`  `"signee": "string",</p><p>`  `"price": "string",</p><p>`  `"user\_id": "string",</p><p></p><p>`  `"tax": "string",</p><p>`  `"advance\_payment\_sum": "string"</p><p>`  `"created\_at": "string"</p><p></p><p>`  `"updated\_at": "string"</p><p>}</p>|
|Galimi atsako kodai|<p>201 Created,</p><p>401 Unauthorized,</p><p>404 Not Found (message),</p><p>422 Unprocessable Content (error message, error array)</p>|

lentelė 12. PUT/PATCH /api/contracts/{id} route specifikacija

|HTTP Metodas|PUT/PATCH /api/contracts/{id}|
| - | - |
|Paskirtis|Atnaujinti kontraktą.|
|Užklausos antraštės (headers)|<p>--header 'Accept: application/json' </p><p>--header 'Content-Type: application/json' </p><p>--'Authorization: Bearer {access-token}'</p>|
|Užklausos parametrai (body)|<p>{</p><p>`  `"sign\_date": "string",</p><p>`  `"sign\_place": "string",</p><p>`  `"customer": "string",</p><p>`  `"signee": "string",</p><p>`  `"price": "string",</p><p>`  `"tax": "string",</p><p>`  `"advance\_payment\_sum": "string",</p><p>`  `"created\_at": "string"</p><p>}</p>|
|Atsakymo struktūra|<p>{</p><p>`  `"id ": "int",</p><p>`  `"sign\_date": "string",</p><p>`  `"sign\_place": "string",</p><p>`  `"customer": "string",</p><p>`  `"signee": "string",</p><p>`  `"price": "string",</p><p>`  `"user\_id": "string",</p><p></p><p>`  `"tax": "string",</p><p>`  `"advance\_payment\_sum": "string"</p><p>`  `"created\_at": "string"</p><p></p><p>`  `"updated\_at": "string"</p><p>}</p>|
|Galimi atsako kodai|<p>200 OK,</p><p>401 Unauthorized,</p><p>404 Not Found (message),</p><p>422 Unprocessable Content (error message, error array)</p>|

lentelė 13. DELETE /api/contracts/{id} route specifikacija

|HTTP Metodas|DELETE /api/contracts/{id}|
| - | - |
|Paskirtis|Ištrinti kontraktą.|
|Užklausos antraštės (headers)|<p>--header 'Accept: application/json' </p><p>--header 'Content-Type: application/json' </p><p>--'Authorization: Bearer {access-token}'</p>|
|Užklausos parametrai (body)|-|
|Atsakymo struktūra|<p>{</p><p>`  `"message": "Deleted successfully"</p><p>}</p>|
|Galimi atsako kodai|<p>200 OK,</p><p>401 Unauthorized,</p><p>404 Not Found (message)</p>|


1. ## **ContractBill „endpoint“**

lentelė 14. GET /api/contracts/{contract\_id}/bills route specifikacija

|HTTP Metodas|GET /api/contracts/{contract\_id}/bills|
| - | - |
|Paskirtis|Gauti visų sąskaitų sąrašą.|
|Užklausos antraštės (headers)|<p>--header 'Accept: application/json' </p><p>--header 'Content-Type: application/json' </p><p>--'Authorization: Bearer {access-token}'</p>|
|Užklausos parametrai (body)|-|
|Atsakymo struktūra|<p>[{</p><p>`  `"id ": "int",</p><p>`  `"amount": "string",</p><p>`  `"contract\_id": "string",</p><p>`  `"services": "string",</p><p>`  `"user\_id": "string",</p><p>`  `"seller\_id": "string",</p><p>`  `"customer\_id": "string",</p><p>`  `"created\_at": "string",</p><p></p><p>`  `"updated\_at": "string"</p><p>} …]</p>|
|Galimi atsako kodai|<p>200 OK,</p><p>401 Unauthorized,</p><p></p><p>404 Not Found (message)</p>|

lentelė 15. GET /api/contracts/{contract\_id}/bills/{bill\_id} route specifikacija

|HTTP Metodas|GET /api/contracts/{contract\_id}/bills/{bill\_id}|
| - | - |
|Paskirtis|Gauti vieną sąskaitą, pagal ID|
|Užklausos antraštės (headers)|<p>--header 'Accept: application/json' </p><p>--header 'Content-Type: application/json' </p><p>--'Authorization: Bearer {access-token}'</p>|
|Užklausos parametrai (body)|-|
|Atsakymo struktūra|<p>{</p><p>`  `"id ": "int",</p><p>`  `"amount": "string",</p><p>`  `"contract\_id": "string",</p><p>`  `"services": "string",</p><p>`  `"user\_id": "string",</p><p>`  `"seller\_id": "string",</p><p>`  `"customer\_id": "string",</p><p>`  `"created\_at": "string",</p><p></p><p>`  `"updated\_at": "string"</p><p>}</p>|
|Galimi atsako kodai|<p>200 OK,</p><p>401 Unauthorized,</p><p>404 Not Found (message)</p>|

lentelė 16. POST /api/contracts/{contract\_id}/bills route specifikacija

|HTTP Metodas|POST /api/contracts/{contract\_id}/bills|
| - | - |
|Paskirtis|Sukurti naują sąskaitos įrašą.|
|Užklausos antraštės (headers)|<p>--header 'Accept: application/json' </p><p>--header 'Content-Type: application/json' </p><p>--'Authorization: Bearer {access-token}'</p>|
|Užklausos parametrai (body)|<p>{</p><p>`  `"amount": "string",</p><p>`  `"contract\_id": "string",</p><p>`  `"services": "string",</p><p>`  `"seller\_id": "string",</p><p>`  `"customer\_id": "string"</p><p>}</p>|
|Atsakymo struktūra|<p>{</p><p>`  `"id ": "int",</p><p>`  `"amount": "string",</p><p>`  `"contract\_id": "string",</p><p>`  `"services": "string",</p><p>`  `"user\_id": "string",</p><p>`  `"seller\_id": "string",</p><p>`  `"customer\_id": "string",</p><p>`  `"created\_at": "string",</p><p></p><p>`  `"updated\_at": "string"</p><p>}</p>|
|Galimi atsako kodai|<p>201 Created,</p><p>401 Unauthorized,</p><p>404 Not Found (message),</p><p>422 Unprocessable Content (error message, error array)</p>|

lentelė 17. PUT/PATCH /api/contracts/{contract\_id}/bills/{bill\_id} route specifikacija

|HTTP Metodas|PUT/PATCH /api/contracts/{contract\_id}/bills/{bill\_id}|
| - | - |
|Paskirtis|Atnaujinti sąskaitą.|
|Užklausos antraštės (headers)|<p>--header 'Accept: application/json' </p><p>--header 'Content-Type: application/json' </p><p>--'Authorization: Bearer {access-token}'</p>|
|Užklausos parametrai (body)|<p>{</p><p>`  `"amount": "string",</p><p>`  `"contract\_id": "string",</p><p>`  `"services": "string",</p><p>`  `"seller\_id": "string",</p><p>`  `"customer\_id": "string"</p><p>}</p>|
|Atsakymo struktūra|<p>{</p><p>`  `"id ": "int",</p><p>`  `"amount": "string",</p><p>`  `"contract\_id": "string",</p><p>`  `"services": "string",</p><p>`  `"user\_id": "string",</p><p>`  `"seller\_id": "string",</p><p>`  `"customer\_id": "string",</p><p>`  `"created\_at": "string",</p><p></p><p>`  `"updated\_at": "string"</p><p>}</p>|
|Galimi atsako kodai|<p>200 OK,</p><p>401 Unauthorized,</p><p>404 Not Found (message),</p><p>422 Unprocessable Content (error message, error array)</p>|

lentelė 18. DELETE /api/contracts/{contract\_id}/bills/{bill\_id} route specifikacija

|HTTP Metodas|DELETE /api/contracts/{contract\_id}/bills/{bill\_id}|
| - | - |
|Paskirtis|Ištrinti sąskaitą.|
|Užklausos antraštės (headers)|<p>--header 'Accept: application/json' </p><p>--header 'Content-Type: application/json' </p><p>--'Authorization: Bearer {access-token}'</p>|
|Užklausos parametrai (body)|-|
|Atsakymo struktūra|<p>{</p><p>`  `"message": "Deleted successfully"</p><p>}</p>|
|Galimi atsako kodai|<p>200 OK,</p><p>401 Unauthorized,</p><p>404 Not Found (message)</p>|

1. ## **ContractBillPayment „endpoint“**

lentelė 19. GET /api/contracts/{contract\_id}/bills/{bill\_id}/payments route specifikacija

|HTTP Metodas|GET /api/contracts/{contract\_id}/bills/{bill\_id}/payments|
| - | - |
|Paskirtis|Gauti visų apmokėjimų sąrašą.|
|Užklausos antraštės (headers)|<p>--header 'Accept: application/json' </p><p>--header 'Content-Type: application/json' </p><p>--'Authorization: Bearer {access-token}'</p>|
|Užklausos parametrai (body)|-|
|Atsakymo struktūra|<p>[{</p><p>`  `"id ": "int",</p><p>`  `"amount\_paid": "string",</p><p>`  `"bill\_id": "string",</p><p>`  `"user\_id": "string",</p><p>`  `"type": "string",</p><p>`  `"created\_at": "string",</p><p></p><p>`  `"updated\_at": "string"</p><p>} …]</p>|
|Galimi atsako kodai|<p>200 OK,</p><p>401 Unauthorized,</p><p></p><p>404 Not Found (message)</p>|

lentelė 20. GET /api/contracts/{contract\_id}/bills/{bill\_id}/payments/{payment\_id} route specifikacija

|HTTP Metodas|GET /api/contracts/{contract\_id}/bills/{bill\_id}/payments/{payment\_id}|
| - | - |
|Paskirtis|Gauti vieną apmokėjimą, pagal ID|
|Užklausos antraštės (headers)|<p>--header 'Accept: application/json' </p><p>--header 'Content-Type: application/json' </p><p>--'Authorization: Bearer {access-token}'</p>|
|Užklausos parametrai (body)|-|
|Atsakymo struktūra|<p>{</p><p>`  `"id ": "int",</p><p>`  `"amount\_paid": "string",</p><p>`  `"bill\_id": "string",</p><p>`  `"user\_id": "string",</p><p>`  `"type": "string",</p><p>`  `"created\_at": "string",</p><p></p><p>`  `"updated\_at": "string"</p><p>}</p>|
|Galimi atsako kodai|<p>200 OK,</p><p>401 Unauthorized,</p><p>404 Not Found (message)</p>|

lentelė 21. POST /api/contracts/{contract\_id}/bills/{bill\_id}/payments route specifikacija

|HTTP Metodas|POST /api/contracts/{contract\_id}/bills/{bill\_id}/payments|
| - | - |
|Paskirtis|Sukurti naują apmokėjimo įrašą.|
|Užklausos antraštės (headers)|<p>--header 'Accept: application/json' </p><p>--header 'Content-Type: application/json' </p><p>--'Authorization: Bearer {access-token}'</p>|
|Užklausos parametrai (body)|<p>{</p><p>`  `"amount\_paid": "string",</p><p>`  `"type": "string"</p><p>}</p>|
|Atsakymo struktūra|<p>{</p><p>`  `"id ": "int",</p><p>`  `"amount\_paid": "string",</p><p>`  `"bill\_id": "string",</p><p>`  `"user\_id": "string",</p><p>`  `"type": "string",</p><p>`  `"created\_at": "string",</p><p></p><p>`  `"updated\_at": "string"</p><p>}</p>|
|Galimi atsako kodai|<p>201 Created,</p><p>401 Unauthorized,</p><p>404 Not Found (message),</p><p>422 Unprocessable Content (error message, error array)</p>|

lentelė 22. PUT/PATCH /api/contracts/{contract\_id}/bills/{bill\_id}/payments/{payment\_id} route specifikacija

|HTTP Metodas|PUT/PATCH /api/contracts/{contract\_id}/bills/{bill\_id}/payments/{payment\_id}|
| - | - |
|Paskirtis|Atnaujinti apmokėjimą.|
|Užklausos antraštės (headers)|<p>--header 'Accept: application/json' </p><p>--header 'Content-Type: application/json' </p><p>--'Authorization: Bearer {access-token}'</p>|
|Užklausos parametrai (body)|<p>{</p><p>`  `"amount\_paid": "string",</p><p>`  `"type": "string"</p><p>}</p>|
|Atsakymo struktūra|<p>{</p><p>`  `"id ": "int",</p><p>`  `"amount\_paid": "string",</p><p>`  `"bill\_id": "string",</p><p>`  `"user\_id": "string",</p><p>`  `"type": "string",</p><p>`  `"created\_at": "string",</p><p></p><p>`  `"updated\_at": "string"</p><p>}</p>|
|Galimi atsako kodai|<p>200 OK,</p><p>401 Unauthorized,</p><p>404 Not Found (message),</p><p>422 Unprocessable Content (error message, error array)</p>|

lentelė 23. DELETE /api/contracts/{contract\_id}/bills/{bill\_id}/payments/{payment\_id} route specifikacija

|HTTP Metodas|DELETE /api/contracts/{contract\_id}/bills/{bill\_id}/payments/{payment\_id}|
| - | - |
|Paskirtis|Ištrinti apmokėjimą.|
|Užklausos antraštės (headers)|<p>--header 'Accept: application/json' </p><p>--header 'Content-Type: application/json' </p><p>--'Authorization: Bearer {access-token}'</p>|
|Užklausos parametrai (body)|-|
|Atsakymo struktūra|<p>{</p><p>`  `"message": "Deleted successfully"</p><p>}</p>|
|Galimi atsako kodai|<p>200 OK,</p><p>401 Unauthorized,</p><p>404 Not Found (message)</p>|

1. # **Naudotojo sąsaja**
Naudotojo sąsają iš viso sudaro 4 unikalūs langai, iš kurių kai kurie yra pernaudojami. Kiekviename lange, išskyrus prisijungimo ir registracijos langus, kairėje pusėje yra navigacijos meniu, kuris išsiskleidžia užvedus ant jo pelės kursori ir reprezentacinis sistemos logotipas. Taip pat, kiekvienas langas yra prisitaikantis prie ekrano dydžio.
1. ## **Langų „wireframes“**
![](Aspose.Words.2ef9e73c-3e45-48f3-b898-4ecd4437b9e6.005.png)

pav. 2. Login ekrano wirefame

![](Aspose.Words.2ef9e73c-3e45-48f3-b898-4ecd4437b9e6.006.png)

pav. 3. Register kerano wireframe

![](Aspose.Words.2ef9e73c-3e45-48f3-b898-4ecd4437b9e6.007.png)

pav. 4. Pagr. lango be iššsokusio menių wireframe


![](Aspose.Words.2ef9e73c-3e45-48f3-b898-4ecd4437b9e6.008.png)

pav. 5. Pagr. lango su iššsokusiu menių wireframe

![](Aspose.Words.2ef9e73c-3e45-48f3-b898-4ecd4437b9e6.009.png)

pav. 6. Lango su įrašų lentele wireframe

![](Aspose.Words.2ef9e73c-3e45-48f3-b898-4ecd4437b9e6.010.png)

pav. 7. Pagrindinio lango, prisitaikiusio prie mažesnių ekranų, be iššokusio meniu, wireframe




![](Aspose.Words.2ef9e73c-3e45-48f3-b898-4ecd4437b9e6.011.png)

pav. 8. . Pagrindinio lango, prisitaikiusio prie mažesnių ekranų, su iššokusiu meniu, wireframe

![](Aspose.Words.2ef9e73c-3e45-48f3-b898-4ecd4437b9e6.012.png)

pav. 9. Lango su įrašų lentele, prisitaikiusio prie mažesnių ekranų, be iššokusio meniu, wireframe

![](Aspose.Words.2ef9e73c-3e45-48f3-b898-4ecd4437b9e6.013.png)

pav. 10. Lango su įrašų lentele, prisitaikiusio prie mažesnių ekranų, su iššokusiu meniu, wireframe

![](Aspose.Words.2ef9e73c-3e45-48f3-b898-4ecd4437b9e6.014.png)

pav. 11. Lango su įrašų lentele, prisitaikiusio prie mažesnių ekranų, su iššokusiu meniu ir modalinių langu, wireframe

Pastaba: modalinis langas iššoka paspaudus „edit“ arba „delete“ mygtukus ir yra atvaizduojami pagal tai, kokių objektų lentelė yra žiūrima. Kai kuriuos „Data Row“ laukus galima paspausti, kas taip pat išmeta modalinį langą. „Edit“ ir minėto lauko paspaudimo modalinis laukas yra identiški, tik „Edit“ langas turi Submit mygtuką. Delete mygtukas iššaukia patvirtinimo modalinį langą. Prisijungimo ir registracijos langai mažesniuose languose atrodo taip pat.

1. ## **Naudotojo sąsajos langai**
Žemiau yra pateikiami ralizuotos naudotojo sąsajos langai. Lentelėse matomi mygtukai - pieštukas, šiukšliadėžė ir akis – atidaro, atitinkamai surašymo tvarka, įrašo informacijos atnaujinimo modalinį langą, įrašo trynimo patvirtinimo modalinį langą arba nukreipia į su įrašu susijusių sekančiame hierarchijos lygyje peržiūros langą. Lentelių eilučių duomenys, esantys pilkame apskritime indikuoja, jog juos galima paspausti ir atidaryti modalinį langą su informacija. Pagr. meniu esančios kortelės yra navigaciniai mygtukai į atitinkamus (pagal jų pavadinimus) puslapius. 

Pakankamai sumažėjus langui pasikeičia elementų išdėstymas, viršuje atsiranda navigacijos juosta, kurioje paspaudus tris horizontalias linijas iššoka navigacinis meniu.

![A screenshot of a login box

Description automatically generated](Aspose.Words.2ef9e73c-3e45-48f3-b898-4ecd4437b9e6.015.png)

pav. 12. Prisijungimo langas

![A screenshot of a login form

Description automatically generated](Aspose.Words.2ef9e73c-3e45-48f3-b898-4ecd4437b9e6.016.png)

pav. 13. Registracijos langas

![A screenshot of a computer

Description automatically generated](Aspose.Words.2ef9e73c-3e45-48f3-b898-4ecd4437b9e6.017.png)

pav. 14.  Pagridinis langas, be iššokusio navigacijos meniu

` `![](Aspose.Words.2ef9e73c-3e45-48f3-b898-4ecd4437b9e6.018.png)              

![A black and white image of buildings

Description automatically generated](Aspose.Words.2ef9e73c-3e45-48f3-b898-4ecd4437b9e6.019.png)

pav. 15. Pagridinis langas, su iššokusiu navigacijos meniu

![A screenshot of a computer

Description automatically generated](Aspose.Words.2ef9e73c-3e45-48f3-b898-4ecd4437b9e6.020.png)

pav. 16.  Kontraktų peržiūros langas, be iššokusio navigacijos meniu

![A screenshot of a computer

Description automatically generated](Aspose.Words.2ef9e73c-3e45-48f3-b898-4ecd4437b9e6.021.png)

pav. 17.  Kontraktų peržiūros langas, su iššokusiu navigacijos meniu

` `![A screenshot of a computer

Description automatically generated](Aspose.Words.2ef9e73c-3e45-48f3-b898-4ecd4437b9e6.022.png)

pav. 18.  Įrašo informacijos keitimo modalinis langas

` `![A white rectangular sign with black text

Description automatically generated](Aspose.Words.2ef9e73c-3e45-48f3-b898-4ecd4437b9e6.023.png)

pav. 19. Įrašo trynimo patvirtinimo modalinis langas

` `![A screenshot of a computer

Description automatically generated](Aspose.Words.2ef9e73c-3e45-48f3-b898-4ecd4437b9e6.024.png)

pav. 20. Sąskaitų peržiūros langas

` `![A screenshot of a phone

Description automatically generated](Aspose.Words.2ef9e73c-3e45-48f3-b898-4ecd4437b9e6.025.png)

pav. 21. Įrašo lauko informacijos peržiūros langas langas

![A screenshot of a phone

Description automatically generated](Aspose.Words.2ef9e73c-3e45-48f3-b898-4ecd4437b9e6.026.png)

pav. 22.  „Mobile view“ Pagrindinis langas, be iššokusio navigacijos meniu

` `![A screenshot of a computer

Description automatically generated](Aspose.Words.2ef9e73c-3e45-48f3-b898-4ecd4437b9e6.027.png)

pav. 23. „Mobile view“ Pagrindinis langas, su iššokusiu navigacijos meniu

![A screenshot of a computer

Description automatically generated](Aspose.Words.2ef9e73c-3e45-48f3-b898-4ecd4437b9e6.028.png)

pav. 24. „Mobile view“ įrašų peržiųros langas, su iššokusiu navigacijos meniu

` `![A screenshot of a computer

Description automatically generated](Aspose.Words.2ef9e73c-3e45-48f3-b898-4ecd4437b9e6.029.png)

pav. 25. „Mobile view“ langas, su iššokusiu įrašo informacijos keitimo modalinių langu

1. # **Išvados**
- Projekto kūrimo metu ne visi pasirinkti sprendimai yra korektiški:
  - Nėra serverinės dalies įrašų puslapiavimo.
  - Klientinės dalies UI yra netvarkingas, prastas dizainas ir nepakankamai gerai prisitaiko prie langų dydžio pasikeitimo.
  - Klientinė dalis netvarko klaidų, gautų iš serverio.
  - Klientinė dalis nėra pasiekiama internete (nėra “hosted”).

- Pilnai realizuota autorizacija ir autentifikacija, tiek serverinėje, tiek klientinėje dalyse.
- Kiekvienas CRUD, esantis API, yra realizuotas klientinėje dalyje.
- Per mažai dėmesio skirta optimizavimui ir suderinamumui.
43
