<a name="br1"></a> 

**Kauno technologijos universitetas**

Informatikos fakultetas

**T120B165 Saityno taikomųjų programų projektavimas**

Projekto „FOrg“ ataskaita

**Ignas Legota, IFF-0/11**

Studentas

**Dėst.val. Baltulionis Simonas**

Dėstytojas

**Dėst.val. Lukošius Tomas**

Dėstytojas

**Kaunas, 2023**



<a name="br2"></a> 

**Turinys**

[**1.**](#br5)[** ](#br5)[Sprendžiamo**](#br5)[** ](#br5)[uždavinio**](#br5)[** ](#br5)[aprašymas**](#br5)[** ](#br5)[...........................................................................................**](#br5)[** ](#br5)[5**](#br5)

[1.1.](#br5)[ ](#br5)[Sistemos](#br5)[ ](#br5)[paskirtis.......................................................................................................................](#br5)[ ](#br5)[5](#br5)

[1.2.](#br5)[ ](#br5)[Funkciniai](#br5)[ ](#br5)[reikalavimai..............................................................................................................](#br5)[ ](#br5)[5](#br5)

[**2.**](#br6)[** ](#br6)[Sistemos**](#br6)[** ](#br6)[architektūra**](#br6)[..................................................................................................................**](#br6)[** ](#br6)[6**](#br6)

[**3.**](#br7)[** ](#br7)[REST**](#br7)[** ](#br7)[API**](#br7)[** ](#br7)[specifikacija**](#br7)[** ](#br7)[..............................................................................................................**](#br7)[** ](#br7)[7**](#br7)

[3.1.](#br7)[ ](#br7)[User](#br7)[ ](#br7)[„endpoint“](#br7)[..........................................................................................................................](#br7)[ ](#br7)[7](#br7)

[3.2.](#br9)[ ](#br9)[Requisite](#br9)[ ](#br9)[„endpoint“](#br9)[ ](#br9)[..................................................................................................................](#br9)[ ](#br9)[9](#br9)

[3.3.](#br12)[ ](#br12)[Contract](#br12)[ ](#br12)[„endpoint“](#br12)[..................................................................................................................](#br12)[ ](#br12)[12](#br12)

[3.4.](#br17)[ ](#br17)[ContractBill](#br17)[ ](#br17)[„endpoint“](#br17)[............................................................................................................](#br17)[ ](#br17)[17](#br17)

[3.5.](#br20)[ ](#br20)[ContractBillPayment](#br20)[ ](#br20)[„endpoint“](#br20)[..............................................................................................](#br20)[ ](#br20)[20](#br20)

[**4.**](#br25)[** ](#br25)[Naudotojo**](#br25)[** ](#br25)[sąsaja**](#br25)[........................................................................................................................**](#br25)[** ](#br25)[25**](#br25)

[4.1.](#br26)[ ](#br26)[Langų](#br26)[ ](#br26)[„wireframes“](#br26)[ ](#br26)[.................................................................................................................](#br26)[ ](#br26)[26](#br26)

[4.2.](#br35)[ ](#br35)[Naudotojo](#br35)[ ](#br35)[sąsajos](#br35)[ ](#br35)[langai](#br35)[ ](#br35)[..........................................................................................................](#br35)[ ](#br35)[35](#br35)

[**5.**](#br45)[** ](#br45)[Išvados**](#br45)[** ](#br45)[........................................................................................................................................**](#br45)[** ](#br45)[45**](#br45)



<a name="br3"></a> 

**Paveikslėliai**

[pav.](file:///C:/Users/ignas/Desktop/Ignas_Legota_IFF011_1lab.docx%23_Toc154009433)[ ](file:///C:/Users/ignas/Desktop/Ignas_Legota_IFF011_1lab.docx%23_Toc154009433)[1](file:///C:/Users/ignas/Desktop/Ignas_Legota_IFF011_1lab.docx%23_Toc154009433)[ ](file:///C:/Users/ignas/Desktop/Ignas_Legota_IFF011_1lab.docx%23_Toc154009433)[Sistemos](file:///C:/Users/ignas/Desktop/Ignas_Legota_IFF011_1lab.docx%23_Toc154009433)[ ](file:///C:/Users/ignas/Desktop/Ignas_Legota_IFF011_1lab.docx%23_Toc154009433)[UML](file:///C:/Users/ignas/Desktop/Ignas_Legota_IFF011_1lab.docx%23_Toc154009433)[ ](file:///C:/Users/ignas/Desktop/Ignas_Legota_IFF011_1lab.docx%23_Toc154009433)[diegimo](file:///C:/Users/ignas/Desktop/Ignas_Legota_IFF011_1lab.docx%23_Toc154009433)[ ](file:///C:/Users/ignas/Desktop/Ignas_Legota_IFF011_1lab.docx%23_Toc154009433)[diagrama............................................................................................](file:///C:/Users/ignas/Desktop/Ignas_Legota_IFF011_1lab.docx%23_Toc154009433)[ ](file:///C:/Users/ignas/Desktop/Ignas_Legota_IFF011_1lab.docx%23_Toc154009433)[6](file:///C:/Users/ignas/Desktop/Ignas_Legota_IFF011_1lab.docx%23_Toc154009433)

[pav.](#br26)[ ](#br26)[2.](#br26)[ ](#br26)[Login](#br26)[ ](#br26)[ekrano](#br26)[ ](#br26)[wirefame..........................................................................................................](#br26)[ ](#br26)[26](#br26)

[pav.](#br27)[ ](#br27)[3.](#br27)[ ](#br27)[Register](#br27)[ ](#br27)[kerano](#br27)[ ](#br27)[wireframe.....................................................................................................](#br27)[ ](#br27)[27](#br27)

[pav.](#br28)[ ](#br28)[4.](#br28)[ ](#br28)[Pagr.](#br28)[ ](#br28)[lango](#br28)[ ](#br28)[be](#br28)[ ](#br28)[iššsokusio](#br28)[ ](#br28)[menių](#br28)[ ](#br28)[wireframe](#br28)[...........................................................................](#br28)[ ](#br28)[28](#br28)

[pav.](#br28)[ ](#br28)[5.](#br28)[ ](#br28)[Pagr.](#br28)[ ](#br28)[lango](#br28)[ ](#br28)[su](#br28)[ ](#br28)[iššsokusiu](#br28)[ ](#br28)[menių](#br28)[ ](#br28)[wireframe](#br28)[...........................................................................](#br28)[ ](#br28)[28](#br28)

[pav.](#br29)[ ](#br29)[6.](#br29)[ ](#br29)[Lango](#br29)[ ](#br29)[su](#br29)[ ](#br29)[įrašų](#br29)[ ](#br29)[lentele](#br29)[ ](#br29)[wireframe](#br29)[...........................................................................................](#br29)[ ](#br29)[29](#br29)

[pav.](#br30)[ ](#br30)[7.](#br30)[ ](#br30)[Pagrindinio](#br30)[ ](#br30)[lango,](#br30)[ ](#br30)[prisitaikiusio](#br30)[ ](#br30)[prie](#br30)[ ](#br30)[mažesnių](#br30)[ ](#br30)[ekranų,](#br30)[ ](#br30)[be](#br30)[ ](#br30)[iššokusio](#br30)[ ](#br30)[meniu,](#br30)[ ](#br30)[wireframe](#br30)[......](#br30)[ ](#br30)[30](#br30)

[pav.](#br31)[ ](#br31)[8.](#br31)[ ](#br31)[.](#br31)[ ](#br31)[Pagrindinio](#br31)[ ](#br31)[lango,](#br31)[ ](#br31)[prisitaikiusio](#br31)[ ](#br31)[prie](#br31)[ ](#br31)[mažesnių](#br31)[ ](#br31)[ekranų,](#br31)[ ](#br31)[su](#br31)[ ](#br31)[iššokusiu](#br31)[ ](#br31)[meniu,](#br31)[ ](#br31)[wireframe](#br31)[....](#br31)[ ](#br31)[31](#br31)

[pav.](#br32)[ ](#br32)[9.](#br32)[ ](#br32)[Lango](#br32)[ ](#br32)[su](#br32)[ ](#br32)[įrašų](#br32)[ ](#br32)[lentele,](#br32)[ ](#br32)[prisitaikiusio](#br32)[ ](#br32)[prie](#br32)[ ](#br32)[mažesnių](#br32)[ ](#br32)[ekranų,](#br32)[ ](#br32)[be](#br32)[ ](#br32)[iššokusio](#br32)[ ](#br32)[meniu,](#br32)[ ](#br32)[wireframe](#br32)[32](#br32)

[pav.](#br33)[ ](#br33)[10.](#br33)[ ](#br33)[Lango](#br33)[ ](#br33)[su](#br33)[ ](#br33)[įrašų](#br33)[ ](#br33)[lentele,](#br33)[ ](#br33)[prisitaikiusio](#br33)[ ](#br33)[prie](#br33)[ ](#br33)[mažesnių](#br33)[ ](#br33)[ekranų,](#br33)[ ](#br33)[su](#br33)[ ](#br33)[iššokusiu](#br33)[ ](#br33)[meniu,](#br33)[ ](#br33)[wireframe](#br33)

[...........................................................................................................................................................](#br33)[ ](#br33)[33](#br33)

[pav.](#br34)[ ](#br34)[11.](#br34)[ ](#br34)[Lango](#br34)[ ](#br34)[su](#br34)[ ](#br34)[įrašų](#br34)[ ](#br34)[lentele,](#br34)[ ](#br34)[prisitaikiusio](#br34)[ ](#br34)[prie](#br34)[ ](#br34)[mažesnių](#br34)[ ](#br34)[ekranų,](#br34)[ ](#br34)[su](#br34)[ ](#br34)[iššokusiu](#br34)[ ](#br34)[meniu](#br34)[ ](#br34)[ir](#br34)[ ](#br34)[modalinių](#br34)

[langu,](#br34)[ ](#br34)[wireframe................................................................................................................................](#br34)[ ](#br34)[34](#br34)

[pav.](#br35)[ ](#br35)[12.](#br35)[ ](#br35)[Prisijungimo](#br35)[ ](#br35)[langas..............................................................................................................](#br35)[ ](#br35)[35](#br35)

[pav.](#br36)[ ](#br36)[13.](#br36)[ ](#br36)[Registracijos](#br36)[ ](#br36)[langas](#br36)[ ](#br36)[.............................................................................................................](#br36)[ ](#br36)[36](#br36)

[pav.](#br37)[ ](#br37)[14.](#br37)[ ](#br37)[Pagridinis](#br37)[ ](#br37)[langas,](#br37)[ ](#br37)[be](#br37)[ ](#br37)[iššokusio](#br37)[ ](#br37)[navigacijos](#br37)[ ](#br37)[meniu](#br37)[.............................................................](#br37)[ ](#br37)[37](#br37)

[pav.](#br37)[ ](#br37)[15.](#br37)[ ](#br37)[Pagridinis](#br37)[ ](#br37)[langas](#br37)[,](#br37)[ ](#br37)[su](#br37)[ ](#br37)[iššokusiu](#br37)[ ](#br37)[navigacijos](#br37)[ ](#br37)[meniu](#br37)[ ](#br37)[..............................................................](#br37)[ ](#br37)[37](#br37)

[pav.](#br37)[ ](#br37)[16.](#br37)[ ](#br37)[Kontraktų](#br37)[ ](#br37)[peržiūros](#br37)[ ](#br37)[langas,](#br37)[ ](#br37)[be](#br37)[ ](#br37)[iššokusio](#br37)[ ](#br37)[navigacijos](#br37)[ ](#br37)[meniu](#br37)[ ](#br37)[.............................................](#br37)[ ](#br37)[37](#br37)

[pav.](#br38)[ ](#br38)[17.](#br38)[ ](#br38)[Kontraktų](#br38)[ ](#br38)[peržiūros](#br38)[ ](#br38)[langas,](#br38)[ ](#br38)[su](#br38)[ ](#br38)[iššokusiu](#br38)[ ](#br38)[navigacijos](#br38)[ ](#br38)[meniu](#br38)[ ](#br38)[.............................................](#br38)[ ](#br38)[38](#br38)

[pav.](#br38)[ ](#br38)[18.](#br38)[ ](#br38)[Įrašo](#br38)[ ](#br38)[informacijos](#br38)[ ](#br38)[keitimo](#br38)[ ](#br38)[modalinis](#br38)[ ](#br38)[langas](#br38)[......................................................................](#br38)[ ](#br38)[38](#br38)

[pav.](#br38)[ ](#br38)[19.](#br38)[ ](#br38)[Įrašo](#br38)[ ](#br38)[trynimo](#br38)[ ](#br38)[patvirtinimo](#br38)[ ](#br38)[modalinis](#br38)[ ](#br38)[langas](#br38)[.......................................................................](#br38)[ ](#br38)[38](#br38)

[pav.](#br39)[ ](#br39)[20.](#br39)[ ](#br39)[Sąskaitų](#br39)[ ](#br39)[peržiūros](#br39)[ ](#br39)[langas](#br39)[.....................................................................................................](#br39)[ ](#br39)[39](#br39)

[pav.](#br40)[ ](#br40)[21.](#br40)[ ](#br40)[Įrašo](#br40)[ ](#br40)[lauko](#br40)[ ](#br40)[informacijos](#br40)[ ](#br40)[peržiūros](#br40)[ ](#br40)[langas](#br40)[ ](#br40)[langas](#br40)[................................................................](#br40)[ ](#br40)[40](#br40)

[pav.](#br41)[ ](#br41)[22.](#br41)[ ](#br41)[„Mobile](#br41)[ ](#br41)[view“](#br41)[ ](#br41)[Pagrindinis](#br41)[ ](#br41)[langas,](#br41)[ ](#br41)[be](#br41)[ ](#br41)[iššokusio](#br41)[ ](#br41)[navigacijos](#br41)[ ](#br41)[meniu](#br41)[ ](#br41)[..................................](#br41)[ ](#br41)[41](#br41)

[pav.](#br42)[ ](#br42)[23.](#br42)[ ](#br42)[„Mobile](#br42)[ ](#br42)[view“](#br42)[ ](#br42)[Pagrindinis](#br42)[ ](#br42)[langas,](#br42)[ ](#br42)[su](#br42)[ ](#br42)[iššokusiu](#br42)[ ](#br42)[navigacijos](#br42)[ ](#br42)[meniu](#br42)[ ](#br42)[...................................](#br42)[ ](#br42)[42](#br42)

[pav.](#br43)[ ](#br43)[24.](#br43)[ ](#br43)[„Mobile](#br43)[ ](#br43)[view“](#br43)[ ](#br43)[įrašų](#br43)[ ](#br43)[peržiųros](#br43)[ ](#br43)[langas,](#br43)[ ](#br43)[su](#br43)[ ](#br43)[iššokusiu](#br43)[ ](#br43)[navigacijos](#br43)[ ](#br43)[meniu](#br43)[..............................](#br43)[ ](#br43)[43](#br43)

[pav.](#br44)[ ](#br44)[25.](#br44)[ ](#br44)[„Mobile](#br44)[ ](#br44)[view“](#br44)[ ](#br44)[langas,](#br44)[ ](#br44)[su](#br44)[ ](#br44)[iššokusiu](#br44)[ ](#br44)[įrašo](#br44)[ ](#br44)[informacijos](#br44)[ ](#br44)[keitimo](#br44)[ ](#br44)[modalinių](#br44)[ ](#br44)[langu](#br44)[...............](#br44)[ ](#br44)[44](#br44)

**Lentelės**

[lentelė](#br7)[ ](#br7)[1.](#br7)[ ](#br7)[POST](#br7)[ ](#br7)[/api/register](#br7)[ ](#br7)[route](#br7)[ ](#br7)[specifikacija](#br7)[ ](#br7)[.................................................................................](#br7)[ ](#br7)[7](#br7)

[lentelė](#br7)[ ](#br7)[2.](#br7)[ ](#br7)[POST](#br7)[ ](#br7)[/api/login](#br7)[ ](#br7)[route](#br7)[ ](#br7)[specifikacija](#br7)[.....................................................................................](#br7)[ ](#br7)[7](#br7)

[lentelė](#br8)[ ](#br8)[3.](#br8)[ ](#br8)[POST](#br8)[ ](#br8)[/api/logout](#br8)[ ](#br8)[route](#br8)[ ](#br8)[specifikacija](#br8)[...................................................................................](#br8)[ ](#br8)[8](#br8)

[lentelė](#br9)[ ](#br9)[4.](#br9)[ ](#br9)[GET](#br9)[ ](#br9)[/api/requisites](#br9)[ ](#br9)[route](#br9)[ ](#br9)[specifikacija](#br9)[................................................................................](#br9)[ ](#br9)[9](#br9)

[lentelė](#br9)[ ](#br9)[5.](#br9)[ ](#br9)[GET](#br9)[ ](#br9)[/api/requisites/{id}](#br9)[ ](#br9)[route](#br9)[ ](#br9)[specifikacija](#br9)[........................................................................](#br9)[ ](#br9)[9](#br9)

[lentelė](#br10)[ ](#br10)[6.](#br10)[ ](#br10)[POST](#br10)[ ](#br10)[/api/requisites](#br10)[ ](#br10)[route](#br10)[ ](#br10)[specifikacija](#br10)[............................................................................](#br10)[ ](#br10)[10](#br10)

[lentelė](#br11)[ ](#br11)[7.](#br11)[ ](#br11)[PUT/PATCH](#br11)[ ](#br11)[/api/requisites/{id}](#br11)[ ](#br11)[route](#br11)[ ](#br11)[specifikacija](#br11)[........................................................](#br11)[ ](#br11)[11](#br11)

[lentelė](#br12)[ ](#br12)[8.](#br12)[ ](#br12)[DELETE](#br12)[ ](#br12)[/api/requisites/{id}](#br12)[ ](#br12)[route](#br12)[ ](#br12)[specifikacija](#br12)[ ](#br12)[..............................................................](#br12)[ ](#br12)[12](#br12)

[lentelė](#br12)[ ](#br12)[9.](#br12)[ ](#br12)[GET](#br12)[ ](#br12)[/api/contracts](#br12)[ ](#br12)[route](#br12)[ ](#br12)[specifikacija](#br12)[...............................................................................](#br12)[ ](#br12)[12](#br12)

[lentelė](#br13)[ ](#br13)[10.](#br13)[ ](#br13)[GET](#br13)[ ](#br13)[/api/contracts/{id}](#br13)[ ](#br13)[route](#br13)[ ](#br13)[specifikacija](#br13)[.....................................................................](#br13)[ ](#br13)[13](#br13)

[lentelė](#br14)[ ](#br14)[11.](#br14)[ ](#br14)[POST](#br14)[ ](#br14)[/api/contracts](#br14)[ ](#br14)[route](#br14)[ ](#br14)[specifikacija](#br14)[...........................................................................](#br14)[ ](#br14)[14](#br14)

[lentelė](#br15)[ ](#br15)[12.](#br15)[ ](#br15)[PUT/PATCH](#br15)[ ](#br15)[/api/contracts/{id}](#br15)[ ](#br15)[route](#br15)[ ](#br15)[specifikacija](#br15)[.......................................................](#br15)[ ](#br15)[15](#br15)

3



<a name="br4"></a> 

[lentelė](#br16)[ ](#br16)[13.](#br16)[ ](#br16)[DELETE](#br16)[ ](#br16)[/api/contracts/{id}](#br16)[ ](#br16)[route](#br16)[ ](#br16)[specifikacija](#br16)[ ](#br16)[.............................................................](#br16)[ ](#br16)[16](#br16)

[lentelė](#br17)[ ](#br17)[14.](#br17)[ ](#br17)[GET](#br17)[ ](#br17)[/api/contracts/{contract_id}/bills](#br17)[ ](#br17)[route](#br17)[ ](#br17)[specifikacija](#br17)[..............................................](#br17)[ ](#br17)[17](#br17)

[lentelė](#br17)[ ](#br17)[15.](#br17)[ ](#br17)[GET](#br17)[ ](#br17)[/api/contracts/{contract_id}/bills/{bill_id}](#br17)[ ](#br17)[route](#br17)[ ](#br17)[specifikacija](#br17)[ ](#br17)[..............................](#br17)[ ](#br17)[17](#br17)

[lentelė](#br18)[ ](#br18)[16.](#br18)[ ](#br18)[POST](#br18)[ ](#br18)[/api/contracts/{contract_id}/bills](#br18)[ ](#br18)[route](#br18)[ ](#br18)[specifikacija](#br18)[............................................](#br18)[ ](#br18)[18](#br18)

[lentelė](#br19)[ ](#br19)[17.](#br19)[ ](#br19)[PUT/PATCH](#br19)[ ](#br19)[/api/contracts/{contract_id}/bills/{bill_id}](#br19)[ ](#br19)[route](#br19)[ ](#br19)[specifikacija](#br19)[ ](#br19)[................](#br19)[ ](#br19)[19](#br19)

[lentelė](#br20)[ ](#br20)[18.](#br20)[ ](#br20)[DELETE](#br20)[ ](#br20)[/api/contracts/{contract_id}/bills/{bill_id}](#br20)[ ](#br20)[route](#br20)[ ](#br20)[specifikacija](#br20)[ ](#br20)[.......................](#br20)[ ](#br20)[20](#br20)

[lentelė](#br21)[ ](#br21)[19.](#br21)[ ](#br21)[GET](#br21)[ ](#br21)[/api/contracts/{contract_id}/bills/{bill_id}/payments](#br21)[ ](#br21)[route](#br21)[ ](#br21)[specifikacija](#br21)[..............](#br21)[ ](#br21)[21](#br21)

[lentelė](#br21)[ ](#br21)[20.](#br21)[ ](#br21)[GET](#br21)[ ](#br21)[/api/contracts/{contract_id}/bills/{bill_id}/payments/{payment_id}](#br21)[ ](#br21)[route](#br21)

[specifikacija.......................................................................................................................................](#br21)[ ](#br21)[21](#br21)

[lentelė](#br22)[ ](#br22)[21.](#br22)[ ](#br22)[POST](#br22)[ ](#br22)[/api/contracts/{contract_id}/bills/{bill_id}/payments](#br22)[ ](#br22)[route](#br22)[ ](#br22)[specifikacija](#br22)[............](#br22)[ ](#br22)[22](#br22)

[lentelė](#br23)[ ](#br23)[22.](#br23)[ ](#br23)[PUT/PATCH](#br23)[ ](#br23)[/api/contracts/{contract_id}/bills/{bill_id}/payments/{payment_id}](#br23)[ ](#br23)[route](#br23)

[specifikacija.......................................................................................................................................](#br23)[ ](#br23)[23](#br23)

[lentelė](#br24)[ ](#br24)[23.](#br24)[ ](#br24)[DELETE](#br24)[ ](#br24)[/api/contracts/{contract_id}/bills/{bill_id}/payments/{payment_id}](#br24)[ ](#br24)[route](#br24)

[specifikacija.......................................................................................................................................](#br24)[ ](#br24)[24](#br24)

4



<a name="br5"></a> 

**1. Sprendžiamo uždavinio aprašymas**

**1.1. Sistemos paskirtis**

Sistemos „FOrg“ tikslas yra palengvinti įmonės sutarčiu, sąskaitų ir apmokėjimų, bei rekvizitų

valdymą.

Kuriama sistema bus padalinta į dvi dalis – internetinę aplikaciją (angl. „web app“) ir serverinę dalį.

Serverinę dalį sudarys REST principu sukurta aplikacijų programavimo sąsaja (angl. „API“), bei

duomenų bazė.

**1.2. Funkciniai reikalavimai**

Sistemoje vyraus 3 rolės – user, super-user ir admin. User rolę turintys naudotojai turės bazines, jiems

skirtas teises, kurias administratorius galės papildyti arba atimti pagal poreikį. Naudotojai sistemoje

negalės atlikti tam tikrų veiksmų, jeigu neturės jiems reikalingos rolės, nors ir turės priskirtą teisę

(pvz. paprastas user negalės keisti įrašų informacijos ir galės matyti tik jo pačio sukurtus įrašus).

Super-user rolę turintys naudotojai papildomai galės matyti visus įrašus. Administratorius turės pilną

prieigą prie sistemos ir šią rolę bus galima priskirti tik pakeitus pačioje duomenų bazėje esamus

duomenis – kitaip sakant, administratorius galės užregistruoti tik sistemą palaikantis programuotojas.

Kitų rolių vartotojus galės užregistruoti administratorius.

Neprisijungęs naudotojas galės atlikti šiuos veiksmus:

• Prisijungti prie sistemos.

• Prisiregistruoti prie sistemos.

Prisijungęs (registruotas) naudotojas galės atlikti šiuos veiksmus:

• Atsijungti nuo sistemos.

• Naviguoti per puslapius.

Toliau pateikiami prisijungusių naudotojų galimi veiksmai, pagal roles:

• User:

o Peržiūrėti savo kurtus įrašus.

o Kurti naujus įrašus.

• Super-user:

o Peržiūrėti visus įrašus.

o Kurti naujus įrašus.

• Administratorius galės viską, ką gali kitos rolės, papildomai:

o Keisti įrašų informaciją.

o Trinti įrašus.

5



<a name="br6"></a> 

**2. Sistemos architektūra**

Sistemą sudarys dvi dalys:

• Klientinė dalis – sukurta naudojant Vue.js, Vuetify ir Nuxt3 karkasą.

• Serverinė dalis – sukurta naudojant PHP Laravel karkasą su MySQL reliacine duomenų baze.

Sistemą sudarančios dalys yra patalpintos viename Azure serveryje. Klientinė ir serverinės dalys

bendrauja naudojant HTTP, per 8080 prievadą. Naudotojas gali kreiptis tik į klientinę dalį, naudojant

HTTP per 80 prievadą. Serverinė dalis yra vienintelė turinti prieigą prie duomenų bazės, su kuria

bendrauja naudojant MYSQL protokolą, per 3306 prievadą.

pav. 1 Sistemos UML diegimo diagrama

6



<a name="br7"></a> 

**3. REST API specifikacija**

Šioje dalyje yra aprašyti serverinės dalies galimi metodai ir informacija apie juos. Rašymo metu,

serverinė dalis yra pasiekiama adresu <http://159.89.16.213/api>[,](http://159.89.16.213/api)[ ](http://159.89.16.213/api)tačiau ateityje gali skirtis, todėl

API metodų aprašymuose pats domenas nebus rašomas.

Taip pat, visiems „endpoint“ informacija yra siunčiama JSON formatu, kaip ir iš jų grąžinama

informacija.

**3.1. User „endpoint“**

lentelė 1. POST /api/register route specifikacija

HTTP Metodas

Paskirtis

POST /api/register

Užsiregistruoti

Užklausos

antraštės --header 'Accept: application/json'

--header 'Content-Type: application/json'

(headers)

Užklausos

parametrai {

"name": "string",

(body)

"email": "user@example.com",

"password": "string",

"confirm\_password": "string"

}

Atsakymo struktūra

{

"token": "string",

"name": "string",

"roles": [

"string"

]

}

Galimi atsako kodai

200 OK, grąžinamas access token, nautotojo vardas ir jo

rolės.

202 Accepted, grąžinamas error (Unautorized Access).

lentelė 2. POST /api/login route specifikacija

POST /api/login

HTTP Metodas

Paskirtis

Prisijungti prie sistemos

7



<a name="br8"></a> 

Užklausos

(headers)

antraštės

--header 'Accept: application/json'

--header 'Content-Type: application/json'

Užklausos

parametrai {

"email": "user@example.com",

"password": "string"

(body)

}

Atsakymo struktūra

{

"token": "string",

"name": "string",

"roles": [

"string"

]

}

Galimi atsako kodai

200 OK, grąžinamas access token, nautotojo vardas ir jo

rolės.

202 Accepted, grąžinamas error (Unautorized Access).

lentelė 3. POST /api/logout route specifikacija

POST /api/logout

HTTP Metodas

Paskirtis

Atsijungti nuo sistemos

Užklausos

(headers)

antraštės --header 'Accept: application/json'

--header 'Content-Type: application/json'

--'Authorization: Bearer {access-token}'

Užklausos

parametrai -

(body)

Atsakymo struktūra

{

}

"message": "successfully logged out"

Galimi atsako kodai

200 OK

401 Unauthorized, message: Unauthenticated

8



<a name="br9"></a> 

**3.2. Requisite „endpoint“**

lentelė 4. GET /api/requisites route specifikacija

GET /api/requisites

HTTP Metodas

Paskirtis

Gauti visų rekvizitų sąrašą.

Užklausos

(headers)

antraštės --header 'Accept: application/json'

--header 'Content-Type: application/json'

--'Authorization: Bearer {access-token}'

Užklausos

parametrai -

(body)

Atsakymo struktūra

[{

"id": "int",

"name": "string",

"code": "string",

"tax\_id": "string",

"address": "string",

"bank\_account": "string",

"creation\_date": "string"

}…]

Galimi atsako kodai

200 OK,

401 Unauthorized,

404 Not Found (message)

lentelė 5. GET /api/requisites/{id} route specifikacija

GET /api/requisites/{id}

HTTP Metodas

Paskirtis

Gauti vieną rekvizitą, pagal ID

Užklausos

(headers)

antraštės --header 'Accept: application/json'

--header 'Content-Type: application/json'

--'Authorization: Bearer {access-token}'

9



<a name="br10"></a> 

Užklausos

parametrai -

(body)

Atsakymo struktūra

{

"id": "int",

"name": "string",

"code": "string",

"tax\_id": "string",

"address": "string",

"bank\_account": "string",

"creation\_date": "string"

}

Galimi atsako kodai

200 OK,

401 Unauthorized,

404 Not Found (message)

lentelė 6. POST /api/requisites route specifikacija

POST /api/requisites

HTTP Metodas

Paskirtis

Sukurti naują rekvizito įrašą.

Užklausos

(headers)

antraštės --header 'Accept: application/json'

--header 'Content-Type: application/json'

--'Authorization: Bearer {access-token}'

Užklausos

parametrai {

(body)

"name": "string",

"code": "string",

"tax\_id": "string",

"address": "string",

"bank\_account": "string",

"creation\_date": "string"

}

Atsakymo struktūra

{

10



<a name="br11"></a> 

"id": "int",

"name": "string",

"code": "string",

"tax\_id": "string",

"address": "string",

"bank\_account": "string",

"creation\_date": "string"

}

Galimi atsako kodai

201 Created,

401 Unauthorized,

404 Not Found (message)

lentelė 7. PUT/PATCH /api/requisites/{id} route specifikacija

PUT/PATCH /api/requisites/{id}

HTTP Metodas

Paskirtis

Atnaujinti rekvizitą.

Užklausos

(headers)

antraštės --header 'Accept: application/json'

--header 'Content-Type: application/json'

--'Authorization: Bearer {access-token}'

Užklausos

parametrai {

(body)

"name": "string",

"code": "string",

"tax\_id": "string",

"address": "string",

"bank\_account": "string",

"creation\_date": "string"

}

Atsakymo struktūra

{

"id": "int",

"name": "string",

"code": "string",

11



<a name="br12"></a> 

"tax\_id": "string",

"address": "string",

"bank\_account": "string",

"creation\_date": "string"

}

Galimi atsako kodai

200 OK,

404 Not Found (message),

422 Unprocessable Content (error message, error array)

lentelė 8. DELETE /api/requisites/{id} route specifikacija

DELETE /api/requisites/{id}

HTTP Metodas

Paskirtis

Ištrinti rekvizitą.

Užklausos

(headers)

antraštės --header 'Accept: application/json'

--header 'Content-Type: application/json'

--'Authorization: Bearer {access-token}'

Užklausos

parametrai -

(body)

Atsakymo struktūra

{

}

"message": "Deleted successfully"

Galimi atsako kodai

200 OK,

404 Not Found (message)

**3.3. Contract „endpoint“**

lentelė 9. GET /api/contracts route specifikacija

GET /api/contracts

HTTP Metodas

Paskirtis

Gauti visų kontraktų sąrašą.

Užklausos

(headers)

antraštės --header 'Accept: application/json'

--header 'Content-Type: application/json'

--'Authorization: Bearer {access-token}'

Užklausos

parametrai -

(body)

12



<a name="br13"></a> 

Atsakymo struktūra

[{

"id ": "int",

"sign\_date": "string",

"sign\_place": "string",

"customer": "string",

"signee": "string",

"price": "string",

"user\_id": "string",

"tax": "string",

"advance\_payment\_sum": "string"

"created\_at": "string"

"updated\_at": "string"

} …]

Galimi atsako kodai

200 OK,

401 Unauthorized,

404 Not Found (message)

lentelė 10. GET /api/contracts/{id} route specifikacija

GET /api/contracts/{id}

HTTP Metodas

Paskirtis

Gauti vieną kontraktą, pagal ID

Užklausos

(headers)

antraštės --header 'Accept: application/json'

--header 'Content-Type: application/json'

--'Authorization: Bearer {access-token}'

Užklausos

parametrai -

(body)

Atsakymo struktūra

{

"id ": "int",

"sign\_date": "string",

"sign\_place": "string",

"customer": "string",

13



<a name="br14"></a> 

"signee": "string",

"price": "string",

"user\_id": "string",

"tax": "string",

"advance\_payment\_sum": "string"

"created\_at": "string"

"updated\_at": "string"

}

Galimi atsako kodai

200 OK,

401 Unauthorized,

404 Not Found (message)

lentelė 11. POST /api/contracts route specifikacija

POST /api/contracts

HTTP Metodas

Paskirtis

Sukurti naują kontrakto įrašą.

Užklausos

(headers)

antraštės --header 'Accept: application/json'

--header 'Content-Type: application/json'

--'Authorization: Bearer {access-token}'

Užklausos

parametrai {

(body)

"sign\_date": "string",

"sign\_place": "string",

"customer": "string",

"signee": "string",

"price": "string",

"tax": "string",

"advance\_payment\_sum": "string"

}

Atsakymo struktūra

{

"id ": "int",

14



<a name="br15"></a> 

"sign\_date": "string",

"sign\_place": "string",

"customer": "string",

"signee": "string",

"price": "string",

"user\_id": "string",

"tax": "string",

"advance\_payment\_sum": "string"

"created\_at": "string"

"updated\_at": "string"

}

Galimi atsako kodai

201 Created,

401 Unauthorized,

404 Not Found (message),

422 Unprocessable Content (error message, error array)

lentelė 12. PUT/PATCH /api/contracts/{id} route specifikacija

PUT/PATCH /api/contracts/{id}

HTTP Metodas

Paskirtis

Atnaujinti kontraktą.

Užklausos

(headers)

antraštės --header 'Accept: application/json'

--header 'Content-Type: application/json'

--'Authorization: Bearer {access-token}'

Užklausos

parametrai {

(body)

"sign\_date": "string",

"sign\_place": "string",

"customer": "string",

"signee": "string",

"price": "string",

"tax": "string",

"advance\_payment\_sum": "string",

"created\_at": "string"

15



<a name="br16"></a> 

}

{

Atsakymo struktūra

"id ": "int",

"sign\_date": "string",

"sign\_place": "string",

"customer": "string",

"signee": "string",

"price": "string",

"user\_id": "string",

"tax": "string",

"advance\_payment\_sum": "string"

"created\_at": "string"

"updated\_at": "string"

}

Galimi atsako kodai

200 OK,

401 Unauthorized,

404 Not Found (message),

422 Unprocessable Content (error message, error array)

lentelė 13. DELETE /api/contracts/{id} route specifikacija

DELETE /api/contracts/{id}

HTTP Metodas

Paskirtis

Ištrinti kontraktą.

Užklausos

(headers)

antraštės --header 'Accept: application/json'

--header 'Content-Type: application/json'

--'Authorization: Bearer {access-token}'

Užklausos

parametrai -

(body)

Atsakymo struktūra

{

}

"message": "Deleted successfully"

Galimi atsako kodai

200 OK,

401 Unauthorized,

404 Not Found (message)

16



<a name="br17"></a> 

**3.4. ContractBill „endpoint“**

lentelė 14. GET /api/contracts/{contract\_id}/bills route specifikacija

HTTP Metodas

Paskirtis

GET /api/contracts/{contract\_id}/bills

Gauti visų sąskaitų sąrašą.

Užklausos

(headers)

antraštės --header 'Accept: application/json'

--header 'Content-Type: application/json'

--'Authorization: Bearer {access-token}'

Užklausos

parametrai -

(body)

Atsakymo struktūra

[{

"id ": "int",

"amount": "string",

"contract\_id": "string",

"services": "string",

"user\_id": "string",

"seller\_id": "string",

"customer\_id": "string",

"created\_at": "string",

"updated\_at": "string"

} …]

Galimi atsako kodai

200 OK,

401 Unauthorized,

404 Not Found (message)

lentelė 15. GET /api/contracts/{contract\_id}/bills/{bill\_id} route specifikacija

HTTP Metodas

Paskirtis

GET /api/contracts/{contract\_id}/bills/{bill\_id}

Gauti vieną sąskaitą, pagal ID

17



<a name="br18"></a> 

Užklausos

(headers)

antraštės --header 'Accept: application/json'

--header 'Content-Type: application/json'

--'Authorization: Bearer {access-token}'

Užklausos

parametrai -

(body)

Atsakymo struktūra

{

"id ": "int",

"amount": "string",

"contract\_id": "string",

"services": "string",

"user\_id": "string",

"seller\_id": "string",

"customer\_id": "string",

"created\_at": "string",

"updated\_at": "string"

}

Galimi atsako kodai

200 OK,

401 Unauthorized,

404 Not Found (message)

lentelė 16. POST /api/contracts/{contract\_id}/bills route specifikacija

HTTP Metodas

POST /api/contracts/{contract\_id}/bills

Paskirtis

Sukurti naują sąskaitos įrašą.

Užklausos

(headers)

antraštės --header 'Accept: application/json'

--header 'Content-Type: application/json'

--'Authorization: Bearer {access-token}'

Užklausos

parametrai {

(body)

"amount": "string",

"contract\_id": "string",

"services": "string",

"seller\_id": "string",

18



<a name="br19"></a> 

"customer\_id": "string"

}

{

Atsakymo struktūra

"id ": "int",

"amount": "string",

"contract\_id": "string",

"services": "string",

"user\_id": "string",

"seller\_id": "string",

"customer\_id": "string",

"created\_at": "string",

"updated\_at": "string"

}

Galimi atsako kodai

201 Created,

401 Unauthorized,

404 Not Found (message),

422 Unprocessable Content (error message, error array)

lentelė 17. PUT/PATCH /api/contracts/{contract\_id}/bills/{bill\_id} route specifikacija

HTTP Metodas

PUT/PATCH /api/contracts/{contract\_id}/bills/{bill\_id}

Paskirtis

Atnaujinti sąskaitą.

Užklausos

(headers)

antraštės --header 'Accept: application/json'

--header 'Content-Type: application/json'

--'Authorization: Bearer {access-token}'

Užklausos

parametrai {

(body)

"amount": "string",

"contract\_id": "string",

"services": "string",

"seller\_id": "string",

"customer\_id": "string"

}

19



<a name="br20"></a> 

Atsakymo struktūra

{

"id ": "int",

"amount": "string",

"contract\_id": "string",

"services": "string",

"user\_id": "string",

"seller\_id": "string",

"customer\_id": "string",

"created\_at": "string",

"updated\_at": "string"

}

Galimi atsako kodai

200 OK,

401 Unauthorized,

404 Not Found (message),

422 Unprocessable Content (error message, error array)

lentelė 18. DELETE /api/contracts/{contract\_id}/bills/{bill\_id} route specifikacija

HTTP Metodas

DELETE /api/contracts/{contract\_id}/bills/{bill\_id}

Paskirtis

Ištrinti sąskaitą.

Užklausos

(headers)

antraštės --header 'Accept: application/json'

--header 'Content-Type: application/json'

--'Authorization: Bearer {access-token}'

Užklausos

parametrai -

(body)

Atsakymo struktūra

{

}

"message": "Deleted successfully"

Galimi atsako kodai

200 OK,

401 Unauthorized,

404 Not Found (message)

**3.5. ContractBillPayment „endpoint“**

20



<a name="br21"></a> 

lentelė 19. GET /api/contracts/{contract\_id}/bills/{bill\_id}/payments route specifikacija

HTTP Metodas

GET

/api/contracts/{contract\_id}/bills/{bill\_id}/payments

Paskirtis

Gauti visų apmokėjimų sąrašą.

Užklausos

(headers)

antraštės --header 'Accept: application/json'

--header 'Content-Type: application/json'

--'Authorization: Bearer {access-token}'

Užklausos

parametrai -

(body)

Atsakymo struktūra

[{

"id ": "int",

"amount\_paid": "string",

"bill\_id": "string",

"user\_id": "string",

"type": "string",

"created\_at": "string",

"updated\_at": "string"

} …]

Galimi atsako kodai

200 OK,

401 Unauthorized,

404 Not Found (message)

lentelė 20. GET /api/contracts/{contract\_id}/bills/{bill\_id}/payments/{payment\_id} route specifikacija

HTTP Metodas

GET

/api/contracts/{contract\_id}/bills/{bill\_id}/payments/{payment\_id}

Paskirtis

Gauti vieną apmokėjimą, pagal ID

Užklausos

(headers)

antraštės --header 'Accept: application/json'

--header 'Content-Type: application/json'

--'Authorization: Bearer {access-token}'

Užklausos

parametrai -

(body)

Atsakymo struktūra

{

21



<a name="br22"></a> 

"id ": "int",

"amount\_paid": "string",

"bill\_id": "string",

"user\_id": "string",

"type": "string",

"created\_at": "string",

"updated\_at": "string"

}

Galimi atsako kodai

200 OK,

401 Unauthorized,

404 Not Found (message)

lentelė 21. POST /api/contracts/{contract\_id}/bills/{bill\_id}/payments route specifikacija

HTTP Metodas

POST

/api/contracts/{contract\_id}/bills/{bill\_id}/payments

Paskirtis

Sukurti naują apmokėjimo įrašą.

Užklausos

(headers)

antraštės --header 'Accept: application/json'

--header 'Content-Type: application/json'

--'Authorization: Bearer {access-token}'

Užklausos

(body)

parametrai {

"amount\_paid": "string",

"type": "string"

}

Atsakymo struktūra

{

"id ": "int",

"amount\_paid": "string",

"bill\_id": "string",

"user\_id": "string",

"type": "string",

"created\_at": "string",

22



<a name="br23"></a> 

"updated\_at": "string"

}

Galimi atsako kodai

201 Created,

401 Unauthorized,

404 Not Found (message),

422 Unprocessable Content (error message, error array)

lentelė 22. PUT/PATCH /api/contracts/{contract\_id}/bills/{bill\_id}/payments/{payment\_id} route

specifikacija

HTTP Metodas

Paskirtis

PUT/PATCH

/api/contracts/{contract\_id}/bills/{bill\_id}/payments/{payment\_id}

Atnaujinti apmokėjimą.

Užklausos

(headers)

antraštės --header 'Accept: application/json'

--header 'Content-Type: application/json'

--'Authorization: Bearer {access-token}'

Užklausos

parametrai {

(body)

"amount\_paid": "string",

"type": "string"

}

Atsakymo struktūra

{

"id ": "int",

"amount\_paid": "string",

"bill\_id": "string",

"user\_id": "string",

"type": "string",

"created\_at": "string",

"updated\_at": "string"

}

Galimi atsako kodai

200 OK,

401 Unauthorized,

404 Not Found (message),

422 Unprocessable Content (error message, error array)

23



<a name="br24"></a> 

lentelė 23. DELETE /api/contracts/{contract\_id}/bills/{bill\_id}/payments/{payment\_id} route specifikacija

HTTP Metodas

DELETE

/api/contracts/{contract\_id}/bills/{bill\_id}/payments/{payment\_id}

Paskirtis

Ištrinti apmokėjimą.

Užklausos

(headers)

antraštės --header 'Accept: application/json'

--header 'Content-Type: application/json'

--'Authorization: Bearer {access-token}'

Užklausos

parametrai -

(body)

Atsakymo struktūra

{

}

"message": "Deleted successfully"

Galimi atsako kodai

200 OK,

401 Unauthorized,

404 Not Found (message)

24



<a name="br25"></a> 

**4. Naudotojo sąsaja**

Naudotojo sąsają iš viso sudaro 4 unikalūs langai, iš kurių kai kurie yra pernaudojami. Kiekviename

lange, išskyrus prisijungimo ir registracijos langus, kairėje pusėje yra navigacijos meniu, kuris

išsiskleidžia užvedus ant jo pelės kursori ir reprezentacinis sistemos logotipas. Taip pat, kiekvienas

langas yra prisitaikantis prie ekrano dydžio.

25



<a name="br26"></a> 

**4.1. Langų „wireframes“**

pav. 2. Login ekrano wirefame

26



<a name="br27"></a> 

pav. 3. Register kerano wireframe

27



<a name="br28"></a> 

pav. 4. Pagr. lango be iššsokusio menių wireframe

pav. 5. Pagr. lango su iššsokusiu menių wireframe

28



<a name="br29"></a> 

pav. 6. Lango su įrašų lentele wireframe

29



<a name="br30"></a> 

pav. 7. Pagrindinio lango, prisitaikiusio prie mažesnių ekranų, be iššokusio meniu, wireframe

30



<a name="br31"></a> 

pav. 8. . Pagrindinio lango, prisitaikiusio prie mažesnių ekranų, su iššokusiu meniu, wireframe

31



<a name="br32"></a> 

pav. 9. Lango su įrašų lentele, prisitaikiusio prie mažesnių ekranų, be iššokusio meniu, wireframe

32



<a name="br33"></a> 

pav. 10. Lango su įrašų lentele, prisitaikiusio prie mažesnių ekranų, su iššokusiu meniu, wireframe

33



<a name="br34"></a> 

pav. 11. Lango su įrašų lentele, prisitaikiusio prie mažesnių ekranų, su iššokusiu meniu ir modalinių langu,

wireframe

Pastaba: modalinis langas iššoka paspaudus „edit“ arba „delete“ mygtukus ir yra atvaizduojami pagal

tai, kokių objektų lentelė yra žiūrima. Kai kuriuos „Data Row“ laukus galima paspausti, kas taip pat

išmeta modalinį langą. „Edit“ ir minėto lauko paspaudimo modalinis laukas yra identiški, tik „Edit“

langas turi Submit mygtuką. Delete mygtukas iššaukia patvirtinimo modalinį langą. Prisijungimo ir

registracijos langai mažesniuose languose atrodo taip pat.

34



<a name="br35"></a> 

**4.2. Naudotojo sąsajos langai**

Žemiau yra pateikiami ralizuotos naudotojo sąsajos langai. Lentelėse matomi mygtukai - pieštukas,

šiukšliadėžė ir akis – atidaro, atitinkamai surašymo tvarka, įrašo informacijos atnaujinimo modalinį

langą, įrašo trynimo patvirtinimo modalinį langą arba nukreipia į su įrašu susijusių sekančiame

hierarchijos lygyje peržiūros langą. Lentelių eilučių duomenys, esantys pilkame apskritime indikuoja,

jog juos galima paspausti ir atidaryti modalinį langą su informacija. Pagr. meniu esančios kortelės

yra navigaciniai mygtukai į atitinkamus (pagal jų pavadinimus) puslapius.

Pakankamai sumažėjus langui pasikeičia elementų išdėstymas, viršuje atsiranda navigacijos juosta,

kurioje paspaudus tris horizontalias linijas iššoka navigacinis meniu.

pav. 12. Prisijungimo langas

35



<a name="br36"></a> 

pav. 13. Registracijos langas

36



<a name="br37"></a> 

pav. 14. Pagridinis langas, be iššokusio navigacijos meniu

pav. 15. Pagridinis langas, su iššokusiu navigacijos meniu

pav. 16. Kontraktų peržiūros langas, be iššokusio navigacijos meniu

37



<a name="br38"></a> 

pav. 17. Kontraktų peržiūros langas, su iššokusiu navigacijos meniu

pav. 18. Įrašo informacijos keitimo modalinis langas

pav. 19. Įrašo trynimo patvirtinimo modalinis langas

38



<a name="br39"></a> 

pav. 20. Sąskaitų peržiūros langas

39



<a name="br40"></a> 

pav. 21. Įrašo lauko informacijos peržiūros langas langas

40



<a name="br41"></a> 

pav. 22. „Mobile view“ Pagrindinis langas, be iššokusio navigacijos meniu

41



<a name="br42"></a> 

pav. 23. „Mobile view“ Pagrindinis langas, su iššokusiu navigacijos meniu

42



<a name="br43"></a> 

pav. 24. „Mobile view“ įrašų peržiųros langas, su iššokusiu navigacijos meniu

43



<a name="br44"></a> 

pav. 25. „Mobile view“ langas, su iššokusiu įrašo informacijos keitimo modalinių langu

44



<a name="br45"></a> 

**5. Išvados**

• Projekto kūrimo metu ne visi pasirinkti sprendimai yra korektiški:

o Nėra serverinės dalies įrašų puslapiavimo.

o Klientinės dalies UI yra netvarkingas, prastas dizainas ir nepakankamai gerai

prisitaiko prie langų dydžio pasikeitimo.

o Klientinė dalis netvarko klaidų, gautų iš serverio.

o Klientinė dalis nėra pasiekiama internete (nėra “hosted”).

• Pilnai realizuota autorizacija ir autentifikacija, tiek serverinėje, tiek klientinėje dalyse.

• Kiekvienas CRUD, esantis API, yra realizuotas klientinėje dalyje.

• Per mažai dėmesio skirta optimizavimui ir suderinamumui.

45


