# Prosty Chat Grupowy

  

Prosty chat grupowy napisany w PHP i MySQL.

Umożliwia rejestrację, logowanie, wysyłanie wiadomości tekstowych i obrazków oraz wyświetlanie wiadomości w czasie rzeczywistym.

  

---

  

## Funkcjonalności

  

### Rejestracja i logowanie użytkowników:

![[Pasted image 20251028203556.png]]

### Wysyłanie wiadomości tekstowych:

![[Pasted image 20251028204136.png]]

### Własne wiadomości wyświetlane jako "You" + podświetlanie wiadomości własnych użytkownika:
![[Pasted image 20251028204229.png]]
![[Pasted image 20251028204249.png]]
### Obsługa linków do obrazków (wyświetlane jako obrazki w wiadomości):
![[Pasted image 20251028204428.png]]
### Automatyczne odświeżanie wiadomości co 2 sekundy:

### Responsywny, ciemny interfejs z fioletowym gradientem:

---
## Instalacja

1. Skopiuj projekt do katalogu serwera PHP (np. `htdocs` w XAMPP)

2. Utwórz bazę danych MySQL i zaimportuj tabele `users` i `messages`

```sql
CREATE TABLE users (

id INT AUTO_INCREMENT PRIMARY KEY,

username VARCHAR(50) NOT NULL UNIQUE,

password VARCHAR(255) NOT NULL

);

  

CREATE TABLE messages (

id INT AUTO_INCREMENT PRIMARY KEY,

user_id INT NOT NULL,

message TEXT,

image VARCHAR(255),

created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

FOREIGN KEY (user_id) REFERENCES users(id)

);

```


3. Skonfiguruj plik config.php z danymi dostępu do bazy:

``` PHP

<?php

$mysqli = new mysqli("localhost", "twoj login", "twoje haslo", "nazwa bazy");

if ($mysqli->connect_error) {

die("Connection failed: " . $mysqli->connect_error);

}

?>
```


4. Uruchom serwer i przejdź do index.php

---

## Struktura projektu
``` scructure
/group_chat

	├─ css/
	
	|	└─ style.css
	
	├─ js/
	
	|	 └─ script.js
	
	├─ index.php
	
	├─ login.php
	
	├─ register.php
	
	├─ chat.php
	
	├─ send_message.php
	
	├─ get_messages.php
	
	├─ config.php
	
	└─ README.md

```


---


## Projekt może być rozbudowany o:

- Emoji i reakcje na wiadomości

- Powiadomienia o nowych wiadomościach

- Prywatne rozmowy i pokoje

- Historia wiadomości z paginacją

---
## Licencja

Ten projekt jest udostępniony na licencji **MIT**.