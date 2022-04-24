import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { HttpClientModule } from '@angular/common/http';
import { IndicadoService } from './indicado.service';
import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { AddIndicadoComponent } from './components/add-indicado/add-indicado.component';
import { UpdateIndicadoComponent } from './components/update-indicado/update-indicado.component';
import { IndicadosListComponent } from './components/indicado-list/indicado-list.component';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import {RouterModule} from '@angular/router';

@NgModule({
  declarations: [
    AppComponent,
    AddIndicadoComponent,
    UpdateIndicadoComponent,
    IndicadosListComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    HttpClientModule,
    FormsModule,
    ReactiveFormsModule,
    RouterModule
  ],
  providers: [IndicadoService],
  bootstrap: [AppComponent]
})
export class AppModule { }
