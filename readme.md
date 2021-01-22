# Projekt - správa zaměstnanců
-----
## Jak se s ním pracuje?
- Vypracováno v Nette
- Vyžaduje min. PHP 7.1
- Umí ukazovat data jak v uživatelském rozhraní, tak i v JSON formátu
- V uživatelském rozhraní můžete vidět tabulku, do které můžete také vkládat hodnoty (vkládat zaměstnance)

----
## JSON formát
Pro získání JSON formátu stačí zadat do URL adresy například toto ->
 * localhost/dashboard/Project/api/get-employees-project-manager (vrátí všechny project managery)
 * localhost/dashboard/Project/api/get-employees-programmer (vrátí všechny programátory)
 * localhost/dashboard/Project/api/get-employees-not-waste-manager (vrátí všechny, kteří nejsou waste manageři)
 * localhost/dashboard/Project/api/get-employees-not-manager (vrátí všechny, kteří nejsou manageři)

Tedy můžeme si všimnout závislosti na tom, že zadání ../api/get-employees....... získáme co chceme.
Také máme druhou možnost, a to, když **NECHCEME** danou funkci, tak ../api/get-employees-not......

Zadáním pouze ../api/get-employees získáme všechny zaměstnance bez rozdílů.

Zadáním ../api/delete-employee/{id} vzmažete daného zaměstnance

----
## Uživatelské rozhraní
V UI máme možnost vidět v tabulce naše zaměstnance a také máme možnost tyto zaměstnance přidávat.
Na UI se můžeme dále odkazovat na jednotlivé zmíněné funkce přes buttony - vše je zvýrazněné.

----
## Databáze
Databáze se skládá ze dvou tabulek, jedna je Funkce a druhá je Zaměstnanci. V tomto Git repositáři je najdete hned na úvodní stránce jméno "project.sql"
Záznam do tabulky Funkce se vytvoří hned při vytváženi Zamšstnance - vytvoří se nám reference na něj.
