import { Component, OnInit } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { HttpClientModule } from '@angular/common/http';
import { ActivatedRoute, Router } from '@angular/router';
import { Location } from '@angular/common';
import{ UserService } from '../services/user.service';
import { AuthenticateService } from '../services/authenticate.service';
import{ PostService } from '../services/post.service';
import {User} from '../models/user';
import { first } from 'rxjs/operators';

@Component({
  selector: 'app-edit-post',
  templateUrl: './edit-post.component.html',
  styleUrls: ['./edit-post.component.css']
})
export class EditPostComponent implements OnInit {
	

 	private baseUrl = 'http://localhost:8000/api/posts';

  currentUser: User;
  users: User[] = [];

	post = [];

  constructor(private http:HttpClient,
    private route: ActivatedRoute,
   	private router: Router,
    private Posts: PostService,
    private User: UserService,
    private authenticationService: AuthenticateService) { 

     this.authenticationService.currentUser.subscribe(x => this.currentUser = x);
  }

  ngOnInit() {
  	let id = +this.route.snapshot.paramMap.get('id');
  	this.Posts.editPost(id).subscribe(data=>{ 
      console.log(data);
      this.post = data
    });
  }

   getUser(){
      return this.User.getUser().pipe(first()).subscribe(users => {
           this.users = users;
        });
    }
    
  updatePost(post){
  	console.log(post);
  	let id = +this.route.snapshot.paramMap.get('id');
  	this.Posts.updatePost(post,id).subscribe(data=>{
     this.post = data;
       this.router.navigate(['/posts']);  
   });
  	
  	
  }
}



