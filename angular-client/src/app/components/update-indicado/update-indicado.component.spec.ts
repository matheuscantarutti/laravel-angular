import { ComponentFixture, TestBed } from '@angular/core/testing';

import { UpdateIndicadoComponent } from './update-indicado.component';

describe('UpdateIndicadoComponent', () => {
  let component: UpdateIndicadoComponent;
  let fixture: ComponentFixture<UpdateIndicadoComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ UpdateIndicadoComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(UpdateIndicadoComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
