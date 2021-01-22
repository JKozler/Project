<?php

// Namespace
namespace App\Presenters;

// Usingy
use Nette;
use Nette\Application\LinkGenerator;
use Nette\Application\Responses\JsonResponse;
use Nette\Utils\Finder;
use Nette\Utils\Json;

final class ApiPresenter extends Nette\Application\UI\Presenter
{
    private $database;
    private $httpRequest;

    function __construct(Nette\Database\Context $database, Nette\Http\Request $httpRequest) {
        // Inicializace vnitřního stavu objektu
        $this->database = $database;
        $this->httpRequest = $httpRequest;
    }

    public function actionGetEmployees() {
        // Získá cestu k modelovému adresáři
        $data = $this->database->query('SELECT * FROM zamestnanci')->fetchAll();
        // Vrátí výsledek
        $this->sendResponse(new JsonResponse($data));
    }

    //Region pro CONTAINS funkci
    public function actionGetEmployeesManager() {
        // Získá cestu k modelovému adresáři
        $manager = $this->database->query('SELECT * FROM funkce WHERE manager=1')->fetchAll();
        $data = [];
        for ($x = 0; $x < count($manager); $x++) {
            $data[$x] = $this->database->query('SELECT * FROM zamestnanci WHERE id=?', $manager[$x]->user_Id)->fetch();
          } 
        // Vrátí výsledek
        $this->sendResponse(new JsonResponse($data));
    }

    public function actionGetEmployeesProgrammer() {
        // Získá cestu k modelovému adresáři
        $manager = $this->database->query('SELECT * FROM funkce WHERE programmer=1')->fetchAll();
        $data = [];
        for ($x = 0; $x < count($manager); $x++) {
            $data[$x] = $this->database->query('SELECT * FROM zamestnanci WHERE id=?', $manager[$x]->user_Id)->fetch();
          } 
        // Vrátí výsledek
        $this->sendResponse(new JsonResponse($data));
    }

    public function actionGetEmployee($id) {
        // Získá cestu k modelovému adresáři
        $user = $this->database->query('SELECT * FROM zamestnanci WHERE id = ?', $id)->fetch();
        $funkce = $this->database->query('SELECT * FROM funkce WHERE user_Id=?', $id)->fetchAll();

        // Vrátí výsledek
        $this->sendResponse(new JsonResponse(['zamestnanec' => $user, 'funkce' => $funkce]));
    }

    public function actionDeleteEmployee($id) {
        // Získá cestu k modelovému adresáři
        $data = $this->database->query('DELETE FROM zamestnanci WHERE id = ?', $id);
        $this->database->query('DELETE FROM funkce WHERE user_Id = ?', $id);
        // Vrátí výsledek
        $this->sendResponse(new JsonResponse($data));
    }

    public function actionGetEmployeesProjectManager() {
        // Získá cestu k modelovému adresáři
        $manager = $this->database->query('SELECT * FROM funkce WHERE projectManager=1')->fetchAll();
        $data = [];
        for ($x = 0; $x < count($manager); $x++) {
            $data[$x] = $this->database->query('SELECT * FROM zamestnanci WHERE id=?', $manager[$x]->user_Id)->fetch();
          } 
        // Vrátí výsledek
        $this->sendResponse(new JsonResponse($data));
    }

    public function actionGetEmployeesWasteManager() {
        // Získá cestu k modelovému adresáři
        $manager = $this->database->query('SELECT * FROM funkce WHERE wasteManager=1')->fetchAll();
        $data = [];
        for ($x = 0; $x < count($manager); $x++) {
            $data[$x] = $this->database->query('SELECT * FROM zamestnanci WHERE id=?', $manager[$x]->user_Id)->fetch();
          } 
        // Vrátí výsledek
        $this->sendResponse(new JsonResponse($data));
    }

    //Region pro NOT CONTAINS funkci
    public function actionGetEmployeesNotManager() {
        // Získá cestu k modelovému adresáři
        $manager = $this->database->query('SELECT * FROM funkce WHERE manager=0')->fetchAll();
        $data = [];
        for ($x = 0; $x < count($manager); $x++) {
            $data[$x] = $this->database->query('SELECT * FROM zamestnanci WHERE id=?', $manager[$x]->user_Id)->fetch();
          } 
        // Vrátí výsledek
        $this->sendResponse(new JsonResponse($data));
    }

    public function actionGetEmployeesNotProgrammer() {
        // Získá cestu k modelovému adresáři
        $manager = $this->database->query('SELECT * FROM funkce WHERE programmer=0')->fetchAll();
        $data = [];
        for ($x = 0; $x < count($manager); $x++) {
            $data[$x] = $this->database->query('SELECT * FROM zamestnanci WHERE id=?', $manager[$x]->user_Id)->fetch();
          } 
        // Vrátí výsledek
        $this->sendResponse(new JsonResponse($data));
    }

    public function actionGetEmployeesNotProjectManager() {
        // Získá cestu k modelovému adresáři
        $manager = $this->database->query('SELECT * FROM funkce WHERE projectManager=0')->fetchAll();
        $data = [];
        for ($x = 0; $x < count($manager); $x++) {
            $data[$x] = $this->database->query('SELECT * FROM zamestnanci WHERE id=?', $manager[$x]->user_Id)->fetch();
          } 
        // Vrátí výsledek
        $this->sendResponse(new JsonResponse($data));
    }

    public function actionGetEmployeesNotWasteManager() {
        // Získá cestu k modelovému adresáři
        $manager = $this->database->query('SELECT * FROM funkce WHERE wasteManager=0')->fetchAll();
        $data = [];
        for ($x = 0; $x < count($manager); $x++) {
            $data[$x] = $this->database->query('SELECT * FROM zamestnanci WHERE id=?', $manager[$x]->user_Id)->fetch();
          } 
        // Vrátí výsledek
        $this->sendResponse(new JsonResponse($data));
    }
}