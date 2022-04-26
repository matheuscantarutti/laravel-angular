import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Indicado } from './shared/indicado';
import { Observable, throwError } from 'rxjs';
import { retry, catchError } from 'rxjs/operators';
@Injectable({
  providedIn: 'root',
})
export class IndicadoService {

  // Base url
  baseurl = 'http://localhost:8000/api';
  constructor(private http: HttpClient) {}
  // Http Headers
  httpOptions = {
    headers: new HttpHeaders({
      'Content-Type': 'application/json',
    }),
  };

  // POST
  CreateIndicado(data:Indicado): Observable<Indicado> {
    return this.http
      .post<Indicado>(
        `${this.baseurl}/indicado`,
        JSON.stringify(data),
        this.httpOptions
      )
  }

  // GET
  GetIndicado(id:string): Observable<Indicado> {
    return this.http
      .get<Indicado>(`${this.baseurl}/indicado/${id}`)
      .pipe(retry(1), catchError(this.errorHandl));
  }

  // GET
  GetIndicados(): Observable<Indicado> {
    return this.http
      .get<Indicado>(`${this.baseurl}/indicados`)
      .pipe(retry(1), catchError(this.errorHandl));
  }

   // GET
   GetEnum(enum_nome:string) {
    return this.http
      .get(`${this.baseurl}/enum/${enum_nome}`)
      .pipe(retry(1), catchError(this.errorHandl));
  }

  EvoluiIndicado(id:string, data:Indicado){
    return this.http
      .patch(
        `${this.baseurl}/indicado/${id}?XDEBUG_SESSION_START=VSCODE`,
        JSON.stringify(data),
        this.httpOptions
      )
      .pipe(retry(1), catchError(this.errorHandl));
  }


  // PUT
  UpdateIndicado(id:string, data:any): Observable<Indicado> {
    return this.http
      .put<Indicado>(
        `${this.baseurl}/indicado/${id}`,
        JSON.stringify(data),
        this.httpOptions
      )
  }

  // DELETE
  DeleteIndicado(id:string) {
    return this.http
      .delete<Indicado>(`${this.baseurl}/indicado/${id}`, this.httpOptions)
      .pipe(retry(1), catchError(this.errorHandl));
  }


  // Error handling
  errorHandl(error:any) {
    let errorMessage = '';
    if (error.error instanceof ErrorEvent) {
      // Get client-side error
      errorMessage = error.error.message;
    } else {
      // Get server-side error
      errorMessage = `Error Code: ${error.status}\nMessage: ${error.message}`;
    }
    console.log(errorMessage);
    return throwError(() => {
      return errorMessage;
    });
  }
}
