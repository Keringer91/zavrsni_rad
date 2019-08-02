# zavrsni_rad by Sabolc Keringer
Vivify - Zavrsni rad
********************************

# Završni zadatak

Cilj zadatka je kreirati jednostavnu blog aplikaciju. Koristiće se starter projekat koji kloniramo pomoću git-a (već kreiran projekat sa postavljenim html-om i css-om na kojem nastavljamo rad). Home stranica treba da prikazuje listu svih postova, a klik na naslov treba da otvara stranicu sa pojedinačnim postom (za početak, svi postovi su hardcode-ovani). Na pojedinačnoj stranici ispod posta treba da bude forma za kreiranje komentara, a ispod svi komentari za taj post izlistani. 
## Zadatak 1.

Klonirati repozitorijum gde se nalazi starter projekat: 
git clone https://gitlab.com/vivify-ideas/vivifyacademy-basic-blog-boilerplate.git . 
Uz pomoć predavača promeniti remote i komitovati na lični github nalog nakon svakog zadatka.

## Zadatak 2.
 
Podeliti html u php template: razdvojiti header, footer i sidebar u posebne partial fajlove (header.php, footer.php, sidebar.php). Glavni sadrzaj postaviti u posebne stranice (posts.php, single-post.php, create-post.php, comments.php) koje će uključivati header, footer i sidebar. 

## Zadatak 3.

U folderu styles kreirati file styles.css i uključiti ga na projekat. U ovom file-u pišemo naš custom css, to jest, menjamo (override-ujemo) postojeće bootstrapove stilove koje dobijamo iz fajla blog.css. Override radimo tako što “pojačavamo” selektore na već postojeće klase.
HTML i Css: 
Naslovi postova na home stranici treba da budu linkovi
Smanjiti veličinu fonta na celom projektu na 14px (html element)
Promeniti boju pozadine navbar-a: #b34848
Zameniti boju svih naslova (ne samo naslova postova) bojom #b34848
Naslovi postova na hover treba da ostanu iste boje, samo će dobiti underline.

## Zadatak 4.

Kreirati bazu ‘blog’ u sql klijentu. 
Kreirati tabelu posts koja sadrzi sledeće kolone:

Id
Title
Body
Author
Created_at

Popuniti nekoliko zapisa ručno.  
Na posts.php stranici zameniti hard-kodovane postove i dovući postove iz baze. Postove poredjati po datumu, najnoviji post treba da se nalazi na vrhu.

## Zadatak 5.

Implementirati otvaranje single-post stranice klikom na naslov posta (prikaz posta je identičan kao na stranici za listanje)
Dodati novu tabelu u bazu, “comments”, koja treba da sadrži:

Id
Author
Text
Post_id

Dodati nekoliko zapisa ručno u novu tabelu i implementirati dovlačenje komentara na single post stranicu, ispod post-a. Komentare implementirati kao unordered list (ul -> li) koje sadrži ime autora i tekst komentara. Komentari trebaju biti razdvojeni borderom (hr)

## Zadatak 6.

Iznad komentara dodati dugme “Hide comments”. Za dugme koristiti bootstrap css klase .btn i .btn-default. Klik na ovo dugme treba da pomoću javascript-a sakrije sve komentare (tako sto će dodati određenu klasu na sve komentare) i promeni tekst dugmeta u “Show comments”. Klik na “Show comments” vraća početno stanje.

## Zadatak 7.

U sidebar.php izbrisati sekcije Archives i Elsewhere. Sekciju About preimenovati u “Latest posts” gde ce se prikazivati naslovi poslednjih 5 postova. 
Naslovi u sidebaru treba da budu linkovi koji će voditi na single-post stranicu datog posta

## Zadatak 8.

Na single-post strani, ispod posta a iznad postojećih komentara, implementirati formu za dodavanje komentara, koja će na submit dodati novi komentar u bazu i prikazati ga na datoj stranici. 
Dodavanje komentara raditi POST request-om na novu php skriptu, create-comment.php, koja će nakon upisivanja u bazu korisnika poslati redirekcijom na single-post.php. Redirekcija se radi u php-u tako što se pozove header('Location: http://example.com/script.php'). Pre ovog poziva ne sme da postoji nikakav output (npr. echo, ili bilo kakav HTML).
Sva polja su obavezna, uraditi validaciju. Ukoliko neko polje nije uneto, izbaciti warning message da se popune sva polja, nevezano za to koje polje nije popunjeno. Koristiti bootstrapove css klase .alert i .alert-danger
Dodati “delete” dugme pored svakog komentara, gde će user moći da izbriše dati komentar klikom na dati link. Za dugme iskoristiti bootstrap css klase .btn i .btn-default

## Zadatak 9.

U navbar-u, izbrisati sve linkove osim home koji vraca user-a na početnu stranicu. Dodati zatim novi link “Create” koji vodi na novu stranicu za kreiranje postova.
Na novoj stranici u fajlu create.php implementirati formu za dodavanje novog posta. Na submit dodati novi post i redirektovati na pocetnu stranicu gde će se prikazati novi post na vrhu. 
Sva polja su obavezna, uraditi validaciju, identično kao za kreiranje komentara.


## Zadatak 10.

Na single-post stranici dodati dugme “Delete this post”. Iskoristiti bootstrap css klase .btn i .btn-primary
Korisnik će klikom na dati button izbrisati post i biće redirektovan na home stranicu. Pre samog brisanja, uraditi proveru u prompt-u (“Do you really want to delete this post?”).

## Dodatak

Dodati tabelu users koja ce imati polja Id, First_Name, Last_Name. Tabelu Posts izmeniti tako da Author ne bude string nego User_Id i da se prilikom povlacenja posta ispisuje ime i prezime korisnika koji je kreirao post.
