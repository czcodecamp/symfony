<?php

namespace AppBundle;

use AppBundle\Entity\Category;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class AppBundle extends Bundle
{
	public function boot()
	{
		$categories = $this->container->get("doctrine")->getRepository(Category::class)->findBy(
			[],
			[
				"rank" => "desc",
			]
		);
		$this->container->get('twig')->addGlobal('categories', $categories);
	}
}
