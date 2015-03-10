<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Books;
use yii\db\Query;

class ReportController extends Controller
{
	// Вывод списка авторов, чьи книги в данный момент читает более трех читателей.
	
    public function actionIndex()
	{
		$post = new Books;
		$data = $post->getStat1();
		
		// SELECT authors.name, count(books.id) FROM books left join book_authors on book_authors.book_id=books.id left join 
		// authors on authors.id=book_authors.author_id where reader>0 group by authors.name having count(books.id)>2 order by count(books.id) desc;
		
		echo $this->render('index', array(
        'data' => $data
		));
	}
	
	// Вывод списка книг, находящихся на руках у читателей, и имеющих не менее трех со-авторов.
	public function actionIndex2()
	{
		$post = new Books;
		$data = $post->getStat2();
		
		// SELECT name, count(book_authors.author_id) FROM books left join book_authors on book_authors.book_id=books.id  where reader>0 
		// group by book_authors.book_id having count(book_authors.author_id)>2 ;
		
		echo $this->render('coauthors', array(
        'data' => $data
		));
	}

	public function actionRandom()
	{
		$post = new Books;
		$data = $data = $post->getRandom();
		
		echo $this->render('random', array(
        'data' => $data
		));
	}

	
}
