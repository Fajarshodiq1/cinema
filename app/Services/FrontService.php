<?php
namespace App\Services;

use App\Models\Workshop;
use App\Repositories\Contracts\CategoryRepositoryInterface;
use App\Repositories\Contracts\WorkshopRepositoryInterface;

class FrontService
{
    protected $categoryRepository;
    protected $workshopRepository;

    public function __construct(WorkshopRepositoryInterface $workshopRepository, CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
        $this->workshopRepository = $workshopRepository;
    }

    public function getFormPageData()
    {
        $categories = $this->categoryRepository->getAllCategories();
        $newWorkshops = $this->workshopRepository->getAllNewWorkshops();

        return compact('categories', 'newWorkshops');
    }
}