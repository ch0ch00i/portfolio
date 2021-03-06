package com.min.hb.student.model;

import java.util.List;
import java.util.Map;

import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;
import org.springframework.transaction.annotation.Transactional;

import com.min.hb.student.dtos.StudentAnswerDto;
import com.min.hb.student.dtos.StudentInfoDto;

@Service
public class ServiceImpl_Student implements IService_Student{
	
	private Logger log = LoggerFactory.getLogger(this.getClass());
	
	@Autowired
	private IDao_Student dao;
	
	
	@Override
	public List<StudentInfoDto> StudentInfoSelect() {
		log.info("ServiceImpl_Student StudentInfoSelect 학생정보 목록 조회:{}");
		return dao.StudentInfoSelect();
	}

	@Override
	public boolean MakeUUID(StudentInfoDto sdto) {
		log.info("ServiceImpl_Student MakeUUID uuid 생성:{}", sdto);
		return dao.MakeUUID(sdto);
	}

	@Override
	public StudentInfoDto MailBasicInfo(String student_code) {
		log.info("ServiceImpl_Student MailBasicInfo 메일 기본정보 생성:{}", student_code);
		return dao.MailBasicInfo(student_code);
	}
	
	@Override
	public StudentInfoDto TestLogin(StudentInfoDto sdto) {
		log.info("ServiceImpl_Student TestLogin 수험자응시 로그인:{}", sdto);
		return dao.TestLogin(sdto);
	}
	
	@Override
	public boolean InputStdIp(Map<String, Object> map) {
		log.info("ServiceImpl_Student InputStdIp 학생 ip 입력:{}", map);
		return dao.InputStdIp(map);
	}
	
	@Override
	public String ChkTestFlag(String student_code) {
		log.info("ServiceImpl_Student ChkTestFlag 응시여부 확인:{}", student_code);
		return dao.ChkTestFlag(student_code);
	}
	
	@Override
	public boolean UpdateTestFlag(String student_code) {
		log.info("ServiceImpl_UpdateTestFlag 응시여부 업데이트 'Y':{}", student_code);
		return dao.UpdateTestFlag(student_code);
	}

	@Override
	public boolean StoreAnswer(Map<String, Object> map) {
		log.info("ServiceImpl_StoreAnswer 학생답안 저장 :{}", map);
		return dao.StoreAnswer(map);
	}
	
	@Override
	public StudentInfoDto StudentDetail(String student_code) {
		log.info("ServiceImpl_StudentDetail 학생 세부내용 조회 :{}", student_code);
		return dao.StudentDetail(student_code);
	}

	@Override
	public String StudentSumPoint(String student_code) {
		log.info("ServiceImpl_StudentSumPoint 학생점수 합계 :{}", student_code);
		return dao.StudentSumPoint(student_code);
	}
	
	@Override
	public List<StudentAnswerDto> StudentAnswerInfo(Map<String, Object> amap) {
		log.info("ServiceImpl_StudentAnswerInfo 학생답안 및 각 답안 점수 조회 :{}", amap);
		return dao.StudentAnswerInfo(amap);
	}

	@Override
	public boolean InsertVideo(Map<String, Object> vmap) {
		log.info("ServiceImpl_InsertVideo 비디오 input :{}", vmap);
		return dao.InsertVideo(vmap);
	}

	@Override
	public List<String> SelectVideoLink(String capture_content) {
		log.info("ServiceImpl_SelectVideoLink 비디오 링크 선택 :{}", capture_content);
		return dao.SelectVideoLink(capture_content);
	}


}
