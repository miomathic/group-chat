# Prosty Chat Grupowy

  

Prosty chat grupowy napisany w PHP i MySQL.

Umożliwia rejestrację, logowanie, wysyłanie wiadomości tekstowych i obrazków oraz wyświetlanie wiadomości w czasie rzeczywistym.

  

---

  

## Funkcjonalności


### Rejestracja i logowanie użytkowników:
#### Rejestracja:
<img width="680" height="533" alt="Screenshot from 2025-10-28 21-03-19" src="https://github.com/user-attachments/assets/04958663-75df-4c69-bd05-4f4d30c322bc" />

#### Logowanie:
<img width="680" height="533" alt="Screenshot from 2025-10-28 21-03-22" src="https://github.com/user-attachments/assets/f43e2197-148f-46b9-9ca0-82daf5903c01" />

### Wysyłanie wiadomości tekstowych:
<img width="604" height="118" alt="Screenshot from 2025-10-28 20-41-33" src="https://github.com/user-attachments/assets/54b45305-c916-4844-aefa-4f822d082b22" />

### Własne wiadomości wyświetlane jako "You" + podświetlanie wiadomości własnych użytkownika:
<img width="610" height="257" alt="Screenshot from 2025-10-28 20-42-26" src="https://github.com/user-attachments/assets/64b54a8b-d21b-445b-80ac-35f6d893e542" />
<img width="610" height="257" alt="Screenshot from 2025-10-28 20-42-46" src="https://github.com/user-attachments/assets/f568fa8a-898d-46fc-bfc8-1821e0fa921d" />


### Obsługa linków do obrazków (wyświetlane jako obrazki w wiadomości):
<img width="667" height="852" alt="Screenshot from 2025-10-28 20-44-24" src="https://github.com/user-attachments/assets/657a05c3-f2e6-4bfb-898a-e102985f78c3" />


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
