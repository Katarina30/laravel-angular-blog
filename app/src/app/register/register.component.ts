import { Component, OnInit } from '@angular/core';
import { HttpClient,HttpHeaders } from '@angular/common/http';
import { HttpClientModule } from '@angular/common/http';
import { ActivatedRoute,  Router } from '@angular/router';
import{ TokenService } from '../services/token.service';

@Component({
  selector: 'app-register',
  templateUrl: './register.component.html',
  styleUrls: ['./register.component.css']
})
export class RegisterComponent implements OnInit {
	private baseUrl = 'http://localhost:8000/api/register';
	
	user = {};

  constructor(private http: HttpClient,
              private Token: TokenService,
              private router: Router) { }

  ngOnInit() {
  }

  register(user){
  	console.log(user);
  		this.http.post<any>(this.baseUrl, user).subscribe(
        data=> this.handleResponse(data)
        );

  }

   handleResponse(data){
    this.Token.handle(data.access_token);
    this.router.navigate(['/login']);
  }
}
