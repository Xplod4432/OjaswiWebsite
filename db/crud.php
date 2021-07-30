<?php
    class crud{
        private $db;

        function __construct($conn){
            $this->db = $conn;
        }

        public function insertBlogs($btitle, $tag, $dob, $bcontent, $bpreview,$fblink,$instalink,$reglink,$destination){
            try {
                // define sql statement to be executed
                $sql = "INSERT INTO ojblog (blogtitle,blog_tag_id,dateofblog,blogcontent,blogpreview,facebooklink,instalink,registrationlink,imagepath) VALUES (:btitle, :tag, :dob, :bcontent, :bpreview,:fblink,:instalink,:reglink,:destination)";
                //prepare the sql statement for execution
                $stmt = $this->db->prepare($sql);
                // bind all placeholders to the actual values
                $stmt->bindparam(':btitle',$btitle);
                $stmt->bindparam(':tag',$tag);
                $stmt->bindparam(':dob',$dob);
                $stmt->bindparam(':bcontent',$bcontent);
                $stmt->bindparam(':bpreview',$bpreview);
                $stmt->bindparam(':fblink',$fblink);
                $stmt->bindparam(':instalink',$instalink);
                $stmt->bindparam(':reglink',$reglink);
                $stmt->bindparam(':destination',$destination);

                // execute statement
                $stmt->execute();
                return true;
        
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function insertFeedbacks($experience,$fren,$ts,$appr,$feedText){
            try {
                // define sql statement to be executed
                $sql = "INSERT INTO `event_feedback`(`overall_experience`, `staff_behaviour`, `date`, `relevance`, `suggestion`) VALUES (:experience,:fren,:ts,:appr,:feedText)";
                //prepare the sql statement for execution
                $stmt = $this->db->prepare($sql);
                // bind all placeholders to the actual values
                $stmt->bindparam(':experience',$experience);
                $stmt->bindparam(':fren',$fren);
                $stmt->bindparam(':ts',$ts);
                $stmt->bindparam(':appr',$appr);
                $stmt->bindparam(':feedText',$feedText);

                // execute statement
                $stmt->execute();
                return true;
        
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function insertComments($cname, $cmail, $ccontent, $cbid, $doc){
            try {
                // define sql statement to be executed
                $sql = "INSERT INTO `blogcoments`(`comment_name`, `comment_mail`, `comment_content`, `blog_id`, `comment_date`) VALUES (:cname,:cmail,:ccontent,:cbid,:doc)";
                //prepare the sql statement for execution
                $stmt = $this->db->prepare($sql);
                // bind all placeholders to the actual values
                $stmt->bindparam(':cname',$cname);
                $stmt->bindparam(':cmail',$cmail);
                $stmt->bindparam(':ccontent',$ccontent);
                $stmt->bindparam(':cbid',$cbid);
                $stmt->bindparam(':doc',$doc);
                // execute statement
                $stmt->execute();
                return true;
        
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function insertParticipant($fname, $lname, $dob, $uniname, $contact,$wacontact,$dept,$regno,$acayear,$regmail,$regcourse){
            try {
                // define sql statement to be executed
                $sql = "INSERT INTO `registration_data`(`firstname`, `lastname`, `dateofbirth`, `university`, `contact`, `whatsapp_contact`, `department`, `registration_number`, `academic_year`, `email`, `course`) VALUES (:fname,:lname,:dob,:uniname,:contact,:wacontact,:dept,:regno,:acayear,:regmail,:regcourse)";
                //prepare the sql statement for execution
                $stmt = $this->db->prepare($sql);
                // bind all placeholders to the actual values
                $stmt->bindparam(':fname',$fname);
                $stmt->bindparam(':lname',$lname);
                $stmt->bindparam(':dob',$dob);
                $stmt->bindparam(':uniname',$uniname);
                $stmt->bindparam(':contact',$contact);
                $stmt->bindparam(':wacontact',$wacontact);
                $stmt->bindparam(':dept',$dept);
                $stmt->bindparam(':regno',$regno);
                $stmt->bindparam(':acayear',$acayear);
                $stmt->bindparam(':regmail',$regmail);
                $stmt->bindparam(':regcourse',$regcourse);
                // execute statement
                $stmt->execute();
                return true;
        
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function editBlog($id,$btitle, $tag, $bcontent, $bpreview,$fblink,$instalink,$reglink){
            try{ 
                 $sql = "UPDATE `ojblog` SET `blogtitle`=:btitle,`blog_tag_id`=:tag,`blogcontent`=:bcontent,`blogpreview`=:bpreview,`facebooklink`=:fblink,`instalink`=:instalink,`registrationlink`=:reglink WHERE blog_id = :id ";
                 $stmt = $this->db->prepare($sql);
                 // bind all placeholders to the actual values
                 $stmt->bindparam(':id',$id);
                 $stmt->bindparam(':btitle',$btitle);
                 $stmt->bindparam(':tag',$tag);
                 $stmt->bindparam(':bcontent',$bcontent);
                 $stmt->bindparam(':bpreview',$bpreview);
                 $stmt->bindparam(':fblink',$fblink);
                 $stmt->bindparam(':instalink',$instalink);
                 $stmt->bindparam(':reglink',$reglink);
                 // execute statement
                 $stmt->execute();
                 return true;
            }catch (PDOException $e) {
             echo $e->getMessage();
             return false;
            }
             
         }

        public function getBlogs(){
            try{
                $sql = "select *from ojblog a inner join blogtypes s on a.blog_tag_id = s.blog_tag_id order by dateofblog DESC";
                $result = $this->db->query($sql);
                return $result;
            }catch (PDOException $e) {
                echo $e->getMessage();
                return false;
           }
           
        }

        public function getComments($id){
            try{
                $sql = "SELECT * FROM `blogcoments` WHERE blog_id = ? ";
                $stmt = $this->db->prepare($sql);
                $stmt->execute([$id]);
                while ($row = $stmt->fetch()) {
                    echo "<div class='comment mt-4 text-justify float-left'>
                    <h4>"; 
                    echo $row['comment_name']; 
                    echo "</h4> <span>";
                    echo $row['comment_date']; 
                    echo "</span> <br>
                    <p>";
                    echo $row['comment_content'];
                    echo "</p>
                </div>";
                }
            }catch (PDOException $e) {
                echo $e->getMessage();
                return false;
           }
           
        }

        public function getCarousel(){
            try{
                $sql = "select *from ojblog order by dateofblog DESC LIMIT 3";
                $result = $this->db->query($sql);
                return $result;
            }catch (PDOException $e) {
                echo $e->getMessage();
                return false;
           }
           
        }

        public function getBlogDetails($id){
            try{
                 $sql = "select * from ojblog a inner join blogtypes s on a.blog_tag_id = s.blog_tag_id where blog_id = :id";
                 $stmt = $this->db->prepare($sql);
                 $stmt->bindparam(':id', $id);
                 $stmt->execute();
                 $result = $stmt->fetch();
                 return $result;
            }catch (PDOException $e) {
                 echo $e->getMessage();
                 return false;
             }
         }
         
         public function deleteBlog($id){
            try{
                 $sql = "delete from ojblog where blog_id = :id";
                 $stmt = $this->db->prepare($sql);
                 $stmt->bindparam(':id', $id);
                 $stmt->execute();
                 return true;
             }catch (PDOException $e) {
                 echo $e->getMessage();
                 return false;
             }
         }

         public function getTags(){
            try{
                $sql = "SELECT * FROM `blogtypes`";
                $result = $this->db->query($sql);
                return $result;
            }catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
            
        }

         public function searchBlogs($search){
            try{
                $sql = "SELECT * FROM `ojblog` a inner join blogtypes s on a.blog_tag_id = s.blog_tag_id WHERE `blogcontent` LIKE :search";
                $stmt = $this->db->prepare($sql);
                $stmt->bindvalue(':search', '%' . $search . '%');
                $stmt->execute();
                while ($r=$stmt->fetch(PDO::FETCH_ASSOC)){
                    $card_src = $r['imagepath'];
                    $card_title = $r['blogtitle'];
                    $card_tag = $r['name'];
                    $card_text = $r['blogpreview'];
                    $card_href = $r['blog_id'];
                    include "./includes/cards.php";
                }
            }catch (PDOException $e) {
                echo $e->getMessage();
                return false;
           }
           
        }

        public function getTagById($id){
            try{
                $sql = "SELECT * FROM `blogtypes` where blog_tag_id = :id";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':id', $id);
                $stmt->execute();
                $result = $stmt->fetch();
                return $result;
            }catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
            
        }
 
    }
    
?>