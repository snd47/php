<?php

class Req2 extends Model
{
    public function getList2() {
        $sql = " select  of.name, sum(re.count) as count, sum(re.price)  as price from keytraff_test_work.requests re
        left join keytraff_test_work.offers of
            on re.offer_id=of.id
        group by of.name";
       
        return $this->db->query($sql);
    }    
}