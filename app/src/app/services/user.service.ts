import { Injectable } from '@angular/core';
import { HttpClient,HttpHeaders  } from '@angular/common/http';
import { HttpClientModule } from '@angular/common/http';


@Injectable({
  providedIn: 'root'
})
export class UserService {
  
  private baseUrl = 'http://localhost:8000/api/user';
	
  public loggedUser={};
 
  constructor(private http: HttpClient) { }

    getUser() {
    	return this.http.get<any>(this.baseUrl);
    }






}
