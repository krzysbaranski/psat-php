# PSAT PHP Project

> ⚠️ **UWAGA / WARNING**
>
> Ten projekt używa przestarzałych bibliotek i frameworków wymagających aktualizacji przed użyciem w produkcji.
>
> This project uses outdated libraries and frameworks that require updates before production use.

## Status projektu / Project Status

### Przestarzałe zależności / Outdated Dependencies

| Dependency | Current Version | Issue |
|------------|-----------------|-------|
| Laravel | 5.2.* | EOL since Dec 2016, no security updates |
| PHP | >=5.5.9 | PHP 5.5 EOL since July 2016 |
| PHPUnit | ~4.0 | EOL since Feb 2017, known vulnerabilities |
| Guzzle | ~6.0 | Should update to latest stable |
| fzaninotto/faker | ~1.4 | Package abandoned, use fakerphp/faker |
| gulp | ^3.8.8 | Outdated, gulp 4+ is current |
| laravel-elixir | ^4.0.0 | Deprecated, use Laravel Mix |
| bootstrap-sass | ^3.4.3 | XSS vulnerability affects all Bootstrap 3.x (CVE-2024-6484), consider upgrading to Bootstrap 5 |

### API Fixer.io

API Fixer.io zostało zaktualizowane w tym repozytorium - wymaga teraz klucza API w zmiennej środowiskowej `FIXER_API_KEY`.
Zarejestruj się na https://fixer.io/ aby uzyskać klucz API.

The Fixer.io API integration has been updated in this repository - it now requires an API key in the `FIXER_API_KEY` environment variable.
Register at https://fixer.io/ to get an API key.

---

# Instrukcje po ściągnięciu repozytorium

## Jeżeli pracujemy na Windowsie potrzebujemy wsparcie do GIT'a:
* http://blog.end3r.com/119/git-latwy-system-kontroli-wersji/

## Formujemy sobie repozytorium do swojego githuba:
* https://help.github.com/articles/fork-a-repo/
* http://blog.end3r.com/142/github-kodowanie-spolecznosciowe/
* http://math.uni.lodz.pl/~skowroa/pz/pz03.html

## Korzystamy w projekcie z Composer:
* https://getcomposer.org/
* http://itcraftsman.pl/composer-czyli-jak-zarzadzac-zaleznosciami-w-php/

dlatego zaraz po ściągnięciu repozytorium na komputer musimy zinstalować zalezności w konsoli systemowej w folderze z plikami wykonujemy:
```bash
composer install
```
## Plik konfiguracyjny i wygenerowanie klucza kryptograficznego

Upewniamy się czy w folderze głownych projektu mamy plik `.env` z niego będa ładowane ustawienia aplikacji. Jeżeli nie mamy u siebie pliku ściągamy plik przykładowy z repozytorium laravela:
* https://raw.githubusercontent.com/laravel/laravel/master/.env.example
i zapisujemy plik u siebie jaki `.env`

W pliku konfiguracyjnym musimy mieć ustawiony klucz kryptograficzny, dlatego generujemy go za pomocą komendy w katalogu głownym:
```bash
php artisan key:generate
```

### Sprawdzamy:
* konfigurację serwera apache
* sprawdzamy czy nasz vhost dodaliśmy do pliku hosts
* uruchamiamy kod w przeglądarce w adresie na który wskazuje vhost

Zespół developerski PSAT:
===
1. Maciej Świderski
2. Bartosz Wojtyła
3. Cezary Praetendo  

