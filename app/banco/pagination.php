<?php

namespace App\Banco;

class Pagination {

	/**
	 * @var integer
	 */
	private $limit;

	/**
	 * @var integer
	 */
	private $results;

	/**
	 * @var integer
	 */
	private $pages;

	/**
	 * @var integer
	 */
	private $currentPage;

	/**
	 * @param integer $results
	 * * @param integer $currentPage
	 * * @param integer $limit
	 */
	public function __construct($results, $currentPage = 1, $limit = 10) {
		$this->results = $results;
		$this->limit = $limit;
		$this->currentPage = (is_numeric($currentPage) and $currentPage > 0) ? $currentPage : 1;
		$this->calculate();
	}

	private function calculate() {
		$this->pages = $this->results > 0 ? ceil($this->results / $this->limit) : 1;
		$this->currentPage = $this->currentPage <= $this->pages ? $this->currentPage : $this->pages;
	}

	/**
	 * @return string
	 */
	public function getLimit() {
		$offset = ($this->limit * ($this->currentPage - 1));
		return $offset . ',' . $this->limit;
	}

	/**
	 * @return array
	 */
	public function getPages() {
		if ($this->pages == 1) return [];

		$paginas = [];
		for ($i = 1; $i <= $this->pages; $i++) {
			$paginas[] = [
				'pagina' => $i,
				'atual' => $i == $this->currentPage
			];
		}

		return $paginas;
	}
}
