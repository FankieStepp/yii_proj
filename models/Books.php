<?php

namespace app\models;

use Yii;
use yii\db\Query;
use \yii\db\Expression;

/**
 * ContactForm is the model behind the contact form.
 */
class Books extends \yii\db\ActiveRecord
{

	public static function tableName()
    {
        return 'books';
    }

	public function rules()
	{
		return array(
			array('name', 'required'),
		);
	}
	
	public static function primaryKey()
    {
        return array('id');
    }
	
    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Name of book',
        ];
    }
	
	public function addAuthor($bid, $aid)
	{
		$connection = \Yii::$app->db;
		// $connection->createCommand("insert into book_authors values (NULL, $id, $aid)");
		$connection->createCommand()->insert('book_authors', ['book_id' => $bid,'author_id' => $aid,])->execute();

		return 1;
	}
	
	public function getStat1()
	{
		$connection = \Yii::$app->db;
		
		// Вывод списка авторов, чьи книги в данный момент читает более трех читателей.
		$model = $connection->createCommand("SELECT authors.name, count(books.id) as counter FROM books left join book_authors on 
			book_authors.book_id=books.id left join authors on authors.id=book_authors.author_id where reader>0 group by 
			authors.name having count(books.id)>3 order by count(books.id) desc;");
			
		$arr = $model->queryAll();		
		return $arr;
	}
	
	public function getStat2()
	{
		$connection = \Yii::$app->db;
		
		// Вывод списка книг, находящихся на руках у читателей, и имеющих не менее трех со-авторов.
		$model = $connection->createCommand("SELECT name, count(book_authors.author_id) as counter FROM books left join book_authors on 
			book_authors.book_id=books.id  where reader>0 group by book_authors.book_id having count(book_authors.author_id)>2 ;");
			
		$arr = $model->queryAll();		
		return $arr;
	}
	
	
	public function getRandom()
	{
		$connection = \Yii::$app->db;
		
		$model = $connection->createCommand("select name, creat, upd from books order by rand() limit 5");
		$arr = $model->queryAll();
		return $arr;
	}
	
	public function getAuthors($bid)
	{
		$connection = \Yii::$app->db;
		
		$model = $connection->createCommand("SELECT name FROM book_authors left join authors on authors.id=book_authors.author_id where book_id=$bid");
		$arr = $model->queryColumn();
		$res = "";
		foreach ($arr as $val)
		{
			$res .= "$val <br>\n";
		}
		
		return $res;
	}

	public function beforeSave($insert)
	{
		if ($this->isNewRecord)
		{
			$this->id = NULL;
			$this->reader = 0;
			$this->creat = new Expression('NOW()');
		}
		
		$this->upd = new Expression('NOW()');
		return parent::beforeSave($insert);
	}

}
