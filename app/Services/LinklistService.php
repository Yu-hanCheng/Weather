<?php
namespace App\Services;
class ListNode
{
    public $data;
    public $next;
    function __construct($data)
    {
        $this->data = $data;
        $this->next = NULL;
    }

}
class LinklistService
{
    public $head;
    public $last;
    public $cnt;

    function __construct()
    {
        $this->head = NULL;
        $this->last = NULL;
        $this->cnt = 0;
    }

    public function insert_first($data)
    {
        $node = new ListNode($data);
        $node->next = $this->head;
        $this->head = &$node;

        //first node
        if($this->last == NULL)
            $this->last = &$node;
            $this->cnt+=1;
    }

    public function insert_before($NewItem,$index){
        $this->insert_after($NewItem,$index-1);
    }

    public function insert_after($NewItem,$index){
        if($index <= 0){
        $this->insert_first($NewItem);
        }elseif ($index==$this->cnt) {
            $node = new ListNode($NewItem);
            $this->last->next = $node;
            $this->last = &$node;

        }
        else{
            $nextnode = $this->head;
            $current = $this->head;
            $node = new ListNode($NewItem);
            for($i=0;$i<$index;$i++)
            {
                $current = $nextnode;
                $nextnode = $nextnode->next;
            }
            $current->next = $node;
            $node->next = $nextnode;
            $this->cnt++;
        }
    }

    public function delete_index($index){
        $nextnode = $this->head;
        $current = $this->head;
        
        if($index == 1)
         {
              if($this->cnt == 1)
               {
                  $this->last = $this->head;
               }
               $this->head = $this->head->next;
        }
        else
        {
            for ($i=0; $i < $index-1 ; $i++) { 
                $current = $nextnode;
                $nextnode = $nextnode->next;
            }
            if($this->cnt == $index)
            {
                $this->last = $current;
                $this->last->next = NULL;
             }else{
                $current->next = $nextnode->next;    
             }
            
        }
        $this->cnt--;
    }
    public function delete_value($value)
    {
        $nextnode = $this->head;
        $current = $this->head;

        while($nextnode->data != $value)
        {
            if($nextnode->next == NULL)
                return NULL;
            else
            {
                $current = $nextnode;
                $nextnode = $nextnode->next;
            }
        }

        if($nextnode == $this->head)
         {
              if($this->cnt == 1)
               {
                  $this->last = $this->head;
               }
               $this->head = $this->head->next;
        }
        else
        {
            if($this->last == $nextnode)
            {
                 $this->last = $current;
             }
            $current->next = $nextnode->next;
        }
        $this->cnt--;
    }
    public function pop_value($value)
    {

        $nextnode = $this->head;
        $current = $this->head;
        $node_data =NULL;
        while($nextnode->data != $value)
        {
            if($nextnode->next == NULL)
                return NULL;
            else
            {
                $current = $nextnode;
                $nextnode = $nextnode->next;
            }
        }

        if($nextnode == $this->head)
         {
              if($this->cnt == 1)
               {
                  $this->last = $this->head;
               }
               $this->head = $this->head->next;
        }
        else
        {
            if($this->last == $nextnode)
            {
                $this->last = $current;
             }
            $node_data = $nextnode->data;
            $current->next = $nextnode->next;
        }
        $this->cnt--;
        return $node_data;
    }

    public function getListLength()
    {
        $ccnt=1;
        $a=$this->head;
        while ($a->next != NULL){
            $a=$a->next;
            $ccnt+=1;
        };
        return $ccnt;
    }

}

?>