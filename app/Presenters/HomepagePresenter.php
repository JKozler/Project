<?php

declare(strict_types=1);

namespace App\Presenters;

use Nette;
use Nette\Application\UI\Form;


final class HomepagePresenter extends Nette\Application\UI\Presenter
{
    private $database;
    function __construct(Nette\Database\Context $database) {
        $this->database = $database;
    }

    public function renderDefault(): void
    {
        $this->template->users = $this->database->table("zamestnanci");
    }

    protected function createComponentAddForm(): Form
    {
        $form = new Form;

        $form->addText('firstName', 'Křestní jméno:')
            ->setHtmlAttribute('class', 'form-control')
            ->addRule($form::MAX_LENGTH, 'Text je příliš dlouhý', 255)
            ->setRequired();
        
        $form->addText('lastName', 'Přijemní:')
            ->setHtmlAttribute('class', 'form-control')
            ->addRule($form::MAX_LENGTH, 'Text je příliš dlouhý', 255)
            ->setRequired();
        
        $form->addCheckbox('manager', 'Je manager?');
        
        $form->addCheckbox('programmer', 'Je programátor?');
        
        $form->addCheckbox('projectManager', 'Je project manager?');

        $form->addCheckbox('wasteManager', 'Je waste manager?');

        $form->addSubmit('send', 'Přidat')
            ->setHtmlAttribute('class', 'btn btn-success');

        $form->addProtection();
        $form->onSuccess[] = [$this, 'itemAddSucceeded'];
        return $form;
    }

    public function itemAddSucceeded(Form $form, \stdClass $item): void
    {
        $this->database->query('INSERT INTO zamestnanci', [
            'firstName' => $item->firstName,
            'lastName' => $item->lastName,
        ]);

        $user = $this->database->query('SELECT * FROM zamestnanci WHERE firstName=? and lastName=?', $item->firstName, $item->lastName)->fetch();

        $this->database->query('INSERT INTO funkce', [
            'user_Id' => $user->id,
            'manager' => $item->manager,
            'programmer' => $item->programmer,
            'projectManager' => $item->projectManager,
            'wasteManager' => $item->wasteManager
        ]);

        $this->flashMessage("Zaměstnanec byl úspěšně přidán.", 'success');
        $this->redirect('Homepage:default');
    }

}
