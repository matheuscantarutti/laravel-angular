import { ComponentFixture, TestBed } from '@angular/core/testing';

import { IndicadoListComponent } from './indicado-list.component';

describe('IndicadoListComponent', () => {
  let component: IndicadoListComponent;
  let fixture: ComponentFixture<IndicadoListComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ IndicadoListComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(IndicadoListComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
